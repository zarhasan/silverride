# JavaScript Coding Rules

## File Organization

- All JS code lives in the `js/` directory and is enqueued via `functions.php`.
- Each `.js` file wraps its body in an IIFE with `'use strict'`:

```js
(function () {
    'use strict';

    const $ = cash;

    // All code goes here
})();
```

- Use `const $ = cash;` at the top of every file. CashJS is always available (enqueued before all other scripts).
- `cash.utils.js` is also loaded before `main.js` — use its utilities whenever possible (see below).

## Code Blocks

- Every logical section of code must be wrapped in its own `(() => { ... })();` block.
- Each block starts with a single-line `//` comment explaining what the block does.

```js
// Fix heading levels inside grid sections
(() => {
    const $grid = $('[data-section-id^="grid-"]');
    if (!$grid.length) return;
    // ...
})();
```

- Inside the top-level `DOMContentLoaded` handler, group all IIFE blocks together, ordered logically.
- Named functions for reusable logic (like `initMobileMenu()`) go outside the IIFE blocks but inside the outer IIFE.

## Early Returns

- Always check for element existence at the start of every block/function and return early if not found:

```js
const $toggle = $('.my-toggle');
if (!$toggle.length) return;
```

## Accessibility (Must Follow)

- Every interactive element must have appropriate ARIA attributes (`aria-expanded`, `aria-label`, `aria-hidden`, `aria-describedby`, `role`, `aria-level`).
- Toggle elements must update `aria-expanded` on state change.
- Hidden content must use `aria-hidden="true"`.
- Focus must be managed: restore previous focus when closing modals/menus, trap focus inside overlays.
- Live regions should be used for dynamic content updates.
- Ensure proper heading hierarchy via ARIA when markup can't be changed.

## CashJS Utilities (`cash.utils.js`)

Always prefer these utilities over writing your own:

| Utility | Use For |
|---|---|
| `$(selector)` | Selecting elements (cash query) |
| `$.debounce(fn, wait)` | Debouncing input/resize/scroll handlers |
| `$.throttle(fn, wait)` | Throttling frequent events |
| `$.xpath(expr)` | XPath queries |
| `$.poll(selector\|fn, options)` | Waiting for DOM elements to appear |
| `$.announce(text, options)` | Announcing changes to screen readers |
| `$(el).observe(callback, options)` | MutationObserver with auto-cleanup |
| `$(el).findFocusables()` | Get all visible focusable elements inside a container |
| `$(el).trapFocus(returnTo)` | Trap Tab key within a container |
| `$(el).untrapFocus()` | Release focus trap |
| `$(el).focusOnEscape(target, options)` | Focus a target when Escape is pressed inside the element |
| `$(el).insertHiddenClone(options)` | Insert a screen-reader-only clone of an element |
| `$(el).isEmpty()` | Check if an element has no visible/accessible content |
| `$(el).onNamedEvent(name, event, handler)` | Add event listener that auto-removes previous with same name |
| `$(el).offNamedEvent(name, event)` | Remove named event listeners |
| `$(el).clickOnEnter(callback)` | Trigger click on Enter keypress |

## DOM Manipulation

- Prefer CashJS methods over vanilla DOM: `$(el).attr()`, `$(el).addClass()`, `$(el).removeClass()`, `$(el).on()`, `$(el).find()`, `$(el).closest()`, `$(el).each()`, `$(el).text()`, `$(el).css()`, `$(el).append()`, `$(el).prepend()`.
- Use vanilla JS only when CashJS doesn't offer the method (e.g., `classList`, `querySelector` on a raw DOM node).

## Event Handling

- Use `$(el).on('click', handler)` pattern with CashJS.
- For one-time named bindings, use `$.fn.onNamedEvent()` to prevent duplicate listeners.
- Use `$.debounce()` for resize/scroll/input events.
- When registering event listeners on `window`, always use `{ passive: true }` for scroll/touch events.

## Naming Conventions

- Initialization functions: `initFeatureName()` (e.g., `initMobileMenu`, `initVideoPlayback`).
- Internal helper functions: descriptive camelCase (e.g., `submitForm`, `updateUI`, `toggleMenu`).
- DOM references: prefix with `$` for Cash objects (e.g., `$menu`, `$toggle`), no prefix for raw DOM (e.g., `card`, `video`).

## Performance

- Cache DOM queries in variables at the top of each block.
- Use `requestAnimationFrame` for visual updates that need to sync with paint.
- Use `setTimeout` only for cleanup or deferred actions (prefer `$.debounce` for events).

## What to Avoid

- Do NOT use jQuery (only CashJS).
- Do NOT mutate HTML attributes on elements that conflict with server-rendered data attributes.
- Do NOT leave commented-out code blocks.
- Do NOT use `innerHTML` unless absolutely necessary (use CashJS `$.fn.append()` or `$.fn.text()`).
- Do NOT add inline styles directly — style changes via CSS classes are preferred unless dynamic values are needed.
