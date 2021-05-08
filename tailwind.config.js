const { colors } = require("tailwindcss/defaultTheme");

module.exports = {
    purge: ["./src/templates/**/*.php"],
    corePlugins: {
        float: false,
    },
    darkMode: false, // or 'media' or 'class'
    theme: {
        container: {
            center: true,
        },
        listStyleType: {
            none: "none",
            disc: "disc",
        },
        fontFamily: {
            sans: [
                '"Inter"',
                "system-ui",
                "-apple-system",
                "BlinkMacSystemFont",
                '"Segoe UI"',
                "Roboto",
                '"Helvetica Neue"',
                "Arial",
                '"Noto Sans"',
                "sans-serif",
                '"Apple Color Emoji"',
                '"Segoe UI Emoji"',
                '"Segoe UI Symbol"',
                '"Noto Color Emoji"',
            ],
            alt: ['"Pacifico"', '"cursive"'],
        },
        extend: {
            colors: {
                primary: {
                    light: "#60bbfc",
                    dark: "#158BC9",
                },
                neutral: {
                    light: "#8B8B8B",
                    medium: "#353535",
                    dark: "#121212",
                },
                success: {
                    lighter: "#AAFFEC",
                    light: "#79FFE1",
                    default: "#50E3C2",
                    dark: "#29BC9B",
                },
                error: {
                    lighter: "#F7D4D6",
                    light: "#FF1A1A",
                    default: "#E00",
                    dark: "#C50000",
                },
                warning: {
                    lighter: "#FFEFCF",
                    light: "#F7B955",
                    default: "#F5A623",
                    dark: "#AB570A",
                },
            },
            height: {
                "screen-full": "calc(100vh - 4rem)",
                "screen-1/2": "calc(50vh - 4rem)",
                "screen-1/3": "calc((100vh - 4rem) / 3)",
                "screen-2/3": "calc((100vh - 4rem) * 2/3)",
                "screen-1/4": "calc((100vh -4rem) / 4)",
                "screen-3/4": "calc((100vh - 4rem) * 3/4)",
                "screen-1/5": "calc((100vh -4rem) / 5)",
            },
            backgroundImage: {
                "hero-pattern": "url('/assets/img/home/hero-test.png')",
            },
            maxWidth: {
                "80-ch": "80ch",
            },
            transformOrigin: {
                0: "0%",
            },
            zIndex: {
                "-1": "-1",
            },
        },
    },
    variants: {
        extend: {
            display: ["responsive", "hover", "focus", "group-hover"],
            textColor: ["responsive", "hover", "focus", "group-hover"],
            backgroundColor: ["responsive", "hover", "focus", "group-hover"],
        },
    },
    plugins: [],
};
