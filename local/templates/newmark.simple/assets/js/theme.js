document.addEventListener("DOMContentLoaded", () => {
	if (window.themeSettings) {
		const root = document.documentElement;

		const getBorderRadius = (option) => {
			let borderRadius = "var(--border-radius-disabled)";

			switch (option) {
				case "1":
					borderRadius = "var(--border-radius-disabled)";
					break;
				case "2":
					borderRadius = "var(--border-radius-xs)";
					break;
				case "3":
					borderRadius = "var(--border-radius-sm)";
					break;
				case "4":
					borderRadius = "var(--border-radius-md)";
					break;
				case "5":
					borderRadius = "var(--border-radius-lg)";
					break;

				default:
					break;
			}

			return borderRadius;
		};

		root.style.setProperty(
			"--current-border-radius",
			getBorderRadius(window.themeSettings.OPTION_BORDER_RADIUS),
		);
		root.style.setProperty("--primary", window.themeSettings.mainColor);
	} else {
		console.warn("Настройки темы не загружены");
	}
});
