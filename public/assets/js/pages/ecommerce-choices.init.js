document.addEventListener("DOMContentLoaded", function () {
    var e = document.querySelectorAll("[data-trigger]");
    for (i = 0; i < e.length; ++i) {
        var a = e[i];
        new Choices(a, {
            placeholderValue: "This is a placeholder set in the config",
            searchPlaceholderValue: "Chercher"
        })
    }
});
