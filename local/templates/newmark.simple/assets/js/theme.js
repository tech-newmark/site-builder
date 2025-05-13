document.addEventListener("DOMContentLoaded", () => {
	if (window.themeSettings) {
		const root = document.documentElement;
		console.log(window.themeSettings);

		for (const [key, value] of Object.entries(window.themeSettings)) {
			root.style.setProperty(`--${key}`, value);
		}
	} else {
		console.warn("Настройки темы не загружены");
	}
});
