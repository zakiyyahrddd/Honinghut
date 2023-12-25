var slider = tns({
    container: '.pinned-slider',
    // items: 2,
    // slideBy: 'page',
    nav: false,
    autoplay: false,
    loop: true,
    controlsContainer: "#customize-controls",
    "mouseDrag": true,
    "gutter": 30,
    "responsive": {
        "420": {
            "fixedWidth": 300,
        },
        "576": {
            "fixedWidth": 445,
        }
    },
});