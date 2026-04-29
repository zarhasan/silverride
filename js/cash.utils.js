(function (root) {
  const $ = root.cash;

  if (!$) {
    console.error("CashJS not found");
    return;
  }

  $.debounce = function (fn, wait = 250, options = {}) {
    const { leading = false, trailing = true } = options;
    let timeoutId = null;
    let lastArgs = null;
    let lastThis = null;
    let result;
    let lastCallTime = null;

    const invokeFunc = (time) => {
      lastCallTime = time;
      return fn.apply(lastThis, lastArgs);
    };

    const debounced = function (...args) {
      const time = Date.now();
      const isLeadingInvoked = leading && !timeoutId;

      lastThis = this;
      lastArgs = args;

      if (timeoutId) clearTimeout(timeoutId);

      if (isLeadingInvoked) {
        result = invokeFunc(time);
      } else if (trailing) {
        timeoutId = setTimeout(() => {
          result = invokeFunc(Date.now());
          timeoutId = null;
        }, wait);
      }

      return result;
    };

    debounced.cancel = function () {
      if (timeoutId) clearTimeout(timeoutId);
      timeoutId = null;
      lastCallTime = null;
    };

    debounced.flush = function () {
      if (timeoutId) {
        result = invokeFunc(Date.now());
        clearTimeout(timeoutId);
        timeoutId = null;
      }
      return result;
    };

    return debounced;
  };

  $.throttle = function (fn, wait = 250, options = {}) {
    const { leading = true, trailing = true } = options;
    let timeoutId = null;
    let lastArgs = null;
    let lastThis = null;
    let result;
    let lastCallTime = null;

    const invokeFunc = (time) => {
      return fn.apply(lastThis, lastArgs);
    };

    const throttled = function (...args) {
      const time = Date.now();
      const isLeadingInvoked = leading && (lastCallTime === null || time - lastCallTime >= wait);

      lastThis = this;
      lastArgs = args;

      if (isLeadingInvoked) {
        if (leading) {
          result = invokeFunc(time);
          lastCallTime = time;
        }
      } else if (trailing && !timeoutId) {
        timeoutId = setTimeout(() => {
          lastCallTime = Date.now();
          timeoutId = null;
          if (lastArgs) {
            result = invokeFunc(lastCallTime);
            lastArgs = null;
          }
        }, wait);
      }

      return result;
    };

    throttled.cancel = function () {
      if (timeoutId) clearTimeout(timeoutId);
      timeoutId = null;
      lastCallTime = null;
    };

    return throttled;
  };

  $.xpath = function (xpathExpr, context = document) {
    const results = [];
    const snapshot = document.evaluate(
      xpathExpr,
      context,
      null,
      XPathResult.ORDERED_NODE_SNAPSHOT_TYPE,
      null
    );
    for (let i = 0; i < snapshot.snapshotLength; i++) {
      results.push(snapshot.snapshotItem(i));
    }
    return $(results); // wrap results into Cash collection for chaining
  };

  $.fn.observe = function (callback, options = { childList: false, subtree: false, attributes: false, runOnInit: false }) {
    const el = this[0];
    if (!el) return this;

    if (options.runOnInit) {
      callback.call(this);
    }

    const observer = new MutationObserver((mutations) => {
      callback.call(this, mutations, observer);
    });

    observer.observe(el, options);
    this._observer = observer; // store observer for potential disconnect
    return this; // chainable
  };

  $.fn.findFocusables = function () {
    const root = this[0] || document;

    if (!root || !(root instanceof HTMLElement || root instanceof Document)) {
      console.warn("findFocusable: Invalid root element provided.");
      return [];
    }

    const focusableSelector = [
      'a[href]',
      'area[href]',
      'input:not([disabled]):not([type="hidden"])',
      'select:not([disabled])',
      'textarea:not([disabled])',
      'button:not([disabled])',
      'iframe',
      'object',
      'embed',
      '[tabindex]:not([tabindex="-1"])',
      '[contenteditable="true"]'
    ].join(',');

    const allElements = root.querySelectorAll(focusableSelector);

    const visibleFocusables = [...allElements].filter(el => {
      const style = window.getComputedStyle(el);

      // Hidden or invisible elements
      if (style.display === 'none' || style.visibility === 'hidden' || style.opacity === '0')
        return false;

      // Not rendered in layout
      if (el.offsetParent === null && style.position !== 'fixed')
        return false;

      // Not visible size
      const rect = el.getBoundingClientRect();
      if (rect.width === 0 && rect.height === 0)
        return false;

      // Disabled or inert
      if (el.hasAttribute('disabled') || el.closest('[inert]') || el.closest('.cart--hidden') || el.closest('.hidden'))
        return false;

      return true;
    });

    this._focusables = visibleFocusables;
    return $(visibleFocusables);
  };

  $.poll = function (query, options = {}) {
    const { interval = 500, timeout = 10000 } = options;

    return new Promise((resolve) => {
      const start = performance.now();

      const check = () => {
        let result = null;

        if (typeof query === "string") {
          result = $(query);
        } else if (typeof query === "function") {
          try {
            result = query();
          } catch {
            result = null;
          }
        }

        // If found (truthy and attached to DOM)
        if (result && result.length > 0) {
          resolve(result);
          return;
        }

        // Stop polling after timeout
        if (performance.now() - start >= timeout) {
          resolve(null);
          return;
        }

        requestAnimationFrame(() => {
          setTimeout(check, interval);
        });
      };

      check();
    });
  };

  $.fn.trapFocus = function (returnTo = null) {
    const el = this[0];
    if (!el) return this;

    const focusables = $(el).findFocusables();
    if (focusables.length === 0) {
      console.warn('trapFocus: No focusable elements inside container.');
      return this;
    }

    // Remove existing handlers
    if (window._trapFocusHandler) {
      window.removeEventListener('keydown', window._trapFocusHandler);
    }

    // Set current active trap
    window._activeTrapContainer = el;

    let index = 0;
    // Main window-level keydown handler
    window._trapFocusHandler = (e) => {
      if (e.key !== 'Tab') return;

      const container = window._activeTrapContainer;
      if (!container || !container.contains(document.activeElement)) return;

      const focusables = $(container).findFocusables();
      if (focusables.length === 0) return;

      const current = document.activeElement;

      let nextIndex;
      if (e.shiftKey) {
        nextIndex = index > 0 ? index - 1 : focusables.length - 1;
      } else {
        nextIndex = index < focusables.length - 1 ? index + 1 : 0;
      }

      e.preventDefault();
      focusables[nextIndex]?.focus();

      index = nextIndex;
    };

    window.addEventListener('keydown', window._trapFocusHandler);

    // Focus first element if none is focused
    if (
      document.activeElement === document.body ||
      !el.contains(document.activeElement)
    ) {
      try {
        focusables[0].focus();
      } catch (err) {
        console.warn('trapFocus: Cannot focus element.', err);
      }
    }

    // Optional escape handler
    if (returnTo) {
      $(el).focusOnEscape(returnTo);
    }

    return this;
  };

  $.fn.untrapFocus = function () {
    const el = this[0];
    if (!el) return this;

    if (window._activeTrapContainer === el) {
      window.removeEventListener('keydown', window._trapFocusHandler);
      delete window._trapFocusHandler;
      delete window._activeTrapContainer;
    }

    return this;
  };


  let liveElementTimeout = null;
  const cache = new Map();

  $.announce = function (text, { role = "status", timeout = 1000, once = false } = {}) {
    // Cache live element reference
    let liveEl;
    if (cache.has('liveElement')) {
      liveEl = cache.get('liveElement');
    } else {
      liveEl = document.querySelector(".live-status-region");
      if (!liveEl) {
        liveEl = document.createElement("div");
        liveEl.classList.add("live-status-region", "sr-only");
        document.body.appendChild(liveEl);
      }
      cache.set('liveElement', liveEl);
    }

    liveEl.setAttribute("role", role);

    const para = document.createElement("p");
    para.textContent = text;
    liveEl.appendChild(para);

    if (once && liveElementTimeout) {
      clearTimeout(liveElementTimeout);
    }

    liveElementTimeout = setTimeout(() => {
      liveEl.innerHTML = "";
      liveEl.setAttribute("role", "status");
      liveElementTimeout = null;
    }, timeout);

    return this;
  };

  $.fn.insertHiddenClone = function (options = {}) {
    const defaults = {
      tag: 'p',
      text: null, // if null, uses element's text
      extraClass: '',
      attributes: {}, // e.g. { 'data-info': 'something' }
      aria: {}, // e.g. { label: 'Custom Label', hidden: true }
      insertPosition: 'before', // 'before' | 'after' | 'prepend' | 'append'
      lowercase: true, // whether to convert text to lowercase
      cache: true // prevent duplicate clones per element
    };

    const settings = { ...defaults, ...options };

    this.each((i, el) => {
      if (!el) return;

      const $el = $(el);
      const cacheKey = `hiddenClone_${i}`;

      if (settings.cache && $el.data(cacheKey)) return;

      // determine text content
      let content = settings.text !== null ? settings.text : $el.text();
      if (settings.lowercase && typeof content === 'string') content = content.toLowerCase();

      // build clone
      const $clone = $(`<${settings.tag}>${content}</${settings.tag}>`)
        .addClass(`sr-only${settings.extraClass ? ' ' + settings.extraClass : ''}`);

      // apply custom attributes
      $.each(settings.attributes, (key, value) => $clone.attr(key, value));

      // apply ARIA attributes
      $.each(settings.aria, (key, value) => $clone.attr(`aria-${key}`, value));

      // insert relative to original element
      switch (settings.insertPosition) {
        case 'after':
          $clone.insertAfter($el);
          break;
        case 'prepend':
          $el.prepend($clone);
          break;
        case 'append':
          $el.append($clone);
          break;
        default:
          $clone.insertBefore($el);
      }

      // mark original as hidden for AT
      $el.attr('aria-hidden', true);

      if (settings.cache) $el.data(cacheKey, true);
    });

    return this; // enable chaining
  };

  $.fn.focusOnEscape = function (target, options = {}) {
    const { delay = 500 } = options;
    const el = this[0];
    if (!el || !target) return this;

    // Clean up previous handler if exists
    if (el._escapeHandler) {
      el.removeEventListener('keydown', el._escapeHandler);
    }

    // Create and store new handler
    el._escapeHandler = (e) => {
      if (e.key === 'Escape') {
        const activeEl = document.activeElement;
        if (el.contains(activeEl)) {
          e.preventDefault();
          el.removeEventListener('keydown', el._escapeHandler);
          delete el._escapeHandler;
          setTimeout(() => {
            try {
              (target instanceof Element ? target : $(target)[0])?.focus();
            } catch (err) {
              console.warn('focusOnEscape: Cannot focus target element', err);
            }
          }, delay);
        };
      };
    };

    el.addEventListener('keydown', el._escapeHandler);
    return this;
  };

  $.fn.isEmpty = function () {
    let isEmpty = true;

    this.each((i, el) => {
      const $el = $(el);
      if (!$el.length) return;

      // Skip hidden elements
      const style = window.getComputedStyle(el);
      if (style.display === 'none' || style.visibility === 'hidden') return;

      // Check visible text content
      const text = $el.text().trim();
      if (text.length > 0) {
        isEmpty = false;
        return false; // break out of .each
      }

      // Check for accessible child elements (convert to array first)
      const children = Array.from($el.children());
      for (const child of children) {
        const $child = $(child);
        if (
          ($child.is('img') && $child.attr('alt')) ||
          ($child.is('svg') && $child.attr('aria-label')) ||
          $child.attr('aria-label') ||
          $child.attr('role') === 'img'
        ) {
          isEmpty = false;
          return false; // break out of .each
        }
      }
    });

    return isEmpty;
  };

  // Named event listeners utility - auto-removes previously added listeners with same name
  $.fn.onNamedEvent = function (name, event, handler, options = {}) {
    const el = this[0];
    if (!el || !name || !event || typeof handler !== 'function') return this;

    // Store named handlers map on element if not exists
    if (!el._namedHandlers) {
      el._namedHandlers = new Map();
    }

    // Remove existing handler with same name and event
    const key = `${name}:${event}`;
    const existing = el._namedHandlers.get(key);
    if (existing) {
      el.removeEventListener(event, existing);
      el._namedHandlers.delete(key);
    }

    // Add new handler
    el.addEventListener(event, handler, options);
    el._namedHandlers.set(key, handler);

    return this;
  };

  $.fn.offNamedEvent = function (name, event) {
    const el = this[0];
    if (!el || !el._namedHandlers) return this;

    const key = event ? `${name}:${event}` : null;

    if (key) {
      // Remove specific named handler
      const handler = el._namedHandlers.get(key);
      if (handler) {
        el.removeEventListener(event, handler);
        el._namedHandlers.delete(key);
      }
    } else {
      // Remove all handlers with this name
      const keysToRemove = [];
      for (const [k, handler] of el._namedHandlers) {
        if (k.startsWith(`${name}:`)) {
          const [, evt] = k.split(':');
          el.removeEventListener(evt, handler);
          keysToRemove.push(k);
        }
      }
      keysToRemove.forEach(k => el._namedHandlers.delete(k));
    }

    // Clean up map if empty
    if (el._namedHandlers.size === 0) {
      delete el._namedHandlers;
    }

    return this;
  };

  // Click on Enter key utility
  $.fn.clickOnEnter = function (callback) {
    const el = this[0];
    if (!el) return this;

    el.addEventListener('keydown', (e) => {
      if (e.key === 'Enter') {
        e.preventDefault();
        if (callback) {
          callback(e);
        } else {
          e.target.click();
        }
      }
    });

    return this;
  };
})(window);
