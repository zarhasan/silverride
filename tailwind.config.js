/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		'./*.php',
		'./**/*.php',
		'./src/**/*.{js,ts,jsx,tsx}',
		'./template-parts/**/*.php',
		'./inc/**/*.php',
		'./blocks/**/*.php',
		'./assets/**/*.js'
	],
	theme: {
		container: {
			center: true,
			padding: {
				"DEFAULT": "1.5rem",
				"sm": "1.5rem",
				"md": "2.5rem",
				"lg": "2.5rem",
				"xl": "2.5rem",
				"2xl": "5vw",
			}
		},
		extend: {
			fontFamily: {
				poppins: ['Poppins', 'sans-serif'],
			},
			colors: {
				primary: '#633E99',
				secondary: '#2B0761',
				primary_black: '#1f143c',
				Header_bg: "#F5F5F5",
			},
			fontWeight: {
				font5: '500',
			},
			margin: {
				margin2: '2px',
			},
			screens: {
				ml: '1249px',
				sl: '1028px',
			},
			fontSize: {
				intermediate: '16px',
				AccessibleHeader1: '2.75rem',
				AccessibleHeader2: '2rem',
				AccessibleHeader3: '1.5rem',
				AccessibleHeader4: '1.25rem',
				AccessibleHeader5: '1rem',
				AccessibleHeader6: '0.75rem',
				AccessibleBody1: '1.125rem',
			},
			boxShadow: {
				boxHover: '0px 20px 47px rgba(0, 0, 0, 0.05)',
				cardShadow: '0px 0px 4px 0px #d5d5d550',
			},
		},
	},
	plugins: [
		require('@tailwindcss/forms'),
		require('@tailwindcss/typography'),
		require('@tailwindcss/aspect-ratio'),
		function ({ addUtilities }) {
			addUtilities({
				'.text-stroke': {
					'-webkit-text-stroke-width': '1px',
					'-webkit-text-stroke-color': '#633E99',
				},
			});
		},
	],
}
