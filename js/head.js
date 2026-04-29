(function() {
    var primaryColor = 'var(--theme-primary, #C41E3A)';
    var secondaryColor = 'var(--theme-secondary, #F26522)';
    var primaryRgb = 'var(--theme-primary-rgb, 196, 30, 58)';
    var altBg = 'var(--theme-alternate-bg, #f8f9fa)';
    
    twind.install({
        hash: false,
        variants: [
            ['when-sm', '@media screen and (max-width: 768px)'],
            ['when-md', '@media screen and (max-width: 1024px)'],
            ['children', '& > *'],
            ['expanded', '&[aria-expanded="true"]'],
            ['focused', '.focused &'],
            ["selected", '&[aria-selected="true"]'],
            ["aria-selected", '&[aria-selected="true"]'],
            ["current", '&[aria-current="true"], &[aria-current="page"]'],
            ["scrolled", "&.scrolled"],
            ["admin-bar", ".admin-bar &"],
            ["touch", "@media (hover: none)"],
            ["dark", "[data-color-scheme='dark'] &"],
        ],
        theme: {
            container: {
                center: true,
                padding: {
                    "DEFAULT": "30px",
                    "sm": "30px",
                    "md": "30px",
                    "lg": "30px",
                    "xl": "30px",
                    "2xl": "30px",
                },
                screens: {
                    "2xl": "1440px",
                },
            },
            extend: {
              colors: {
                  primary: primaryColor,
                  "primary-hover": primaryColor,
                  "primary-gradient-start": primaryColor,
                  "primary-gradient-end": secondaryColor,
                  "dark-blue": "#0a101e",
                  "dark-overlay": "rgba(10, 16, 30, 0.9)",
                  "section-light": "#ffffff",
                  "alternate-bg": altBg,
              },
              borderRadius: {
                  DEFAULT: "0.25rem",
              },
              backgroundImage: {
                  "brand-gradient": "linear-gradient(135deg, " + primaryColor + " 0%, " + secondaryColor + " 100%)",
                  "brand-gradient-hover": "linear-gradient(135deg, " + primaryColor + " 0%, " + primaryColor + " 100%)",
                  "dark-gradient": "linear-gradient(to right, #0a101e 40%, rgba(10, 16, 30, 0.9))",
                  "grid-pattern": "radial-gradient(circle, #e5e7eb 1px, transparent 1px)",
                  "dots-pattern": "radial-gradient(" + primaryColor + " 0.5px, transparent 0.5px), radial-gradient(" + primaryColor + " 0.5px, #e5e5f7 0.5px)",
              },
              backgroundSize: {
                  "grid-size": "20px 20px",
              },
              boxShadow: {
                  soft: "0 10px 40px -10px rgba(0,0,0,0.08)",
                  glow: "0 0 15px rgba(" + primaryRgb + ", 0.3)",
                  "glow-lg": "0 0 40px rgba(" + primaryRgb + ", 0.4)",
              },
              animation: {
                  "fade-in-up": "fadeInUp 0.8s ease-out forwards",
                  "pulse-slow": "pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite",
                  float: "float 6s ease-in-out infinite",
                  "float-delayed": "float 6s ease-in-out 3s infinite",
                  "spin-slow": "spin 12s linear infinite",
              },
              keyframes: {
                  fadeInUp: {
                      "0%": { opacity: "0", transform: "translateY(20px)" },
                      "100%": { opacity: "1", transform: "translateY(0)" },
                  },
                  float: {
                      "0%, 100%": { transform: "translateY(0)" },
                      "50%": { transform: "translateY(-20px)" },
                  },
              },
            },
        },
    });
})();
