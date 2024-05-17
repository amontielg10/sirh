<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tooltip Example</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* styles.css */
[data-tooltip] {
    position: relative;
    cursor: pointer;
}

[data-tooltip]::after {
    content: attr(data-tooltip);
    position: absolute;
    top: -5px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #333;
    color: #fff;
    padding: 5px;
    border-radius: 5px;
    white-space: nowrap;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.2s ease-in-out;
}

[data-tooltip]:hover::after {
    opacity: 1;
}
    </style>
</head>
<body>
    <button data-tooltip="This is a tooltip">Hover over me</button>
    <button data-tooltip="Another tooltip text">Hover over me too</button>

    <script src="scripts.js"></script>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const tooltips = document.querySelectorAll('[data-tooltip]');

    tooltips.forEach(tooltip => {
        tooltip.addEventListener('mouseenter', function () {
            const tooltipText = tooltip.getAttribute('data-tooltip');
            const tooltipElement = document.createElement('div');
            tooltipElement.className = 'tooltip';
            tooltipElement.textContent = tooltipText;
            document.body.appendChild(tooltipElement);

            const rect = tooltip.getBoundingClientRect();
            tooltipElement.style.left = `${rect.left + window.pageXOffset + rect.width / 2}px`;
            tooltipElement.style.top = `${rect.top + window.pageYOffset - tooltipElement.offsetHeight}px`;

            tooltip._tooltipElement = tooltipElement;
        });

        tooltip.addEventListener('mouseleave', function () {
            if (tooltip._tooltipElement) {
                document.body.removeChild(tooltip._tooltipElement);
                tooltip._tooltipElement = null;
            }
        });
    });
});
</script>
</html>