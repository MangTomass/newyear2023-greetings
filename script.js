// script.js
import { FireworksOptions } from './option'; // Adjust the path based on your file structure

document.addEventListener("DOMContentLoaded", function() {
    const fireworksContainer = document.createElement("div");
    fireworksContainer.className = "fireworks-container";
    document.body.appendChild(fireworksContainer);

    function createFirework() {
        const firework = document.createElement("div");
        firework.className = "firework";
        fireworksContainer.appendChild(firework);

        const colors = ["#ff8c00", "#ffeb3b", "#03a9f4", "#e91e63", "#4caf50"];
        const randomColor = colors[Math.floor(Math.random() * colors.length)];

        firework.style.backgroundColor = randomColor;

        const posX = Math.random() * window.innerWidth;
        const posY = Math.random() * window.innerHeight;

        firework.style.left = `${posX}px`;
        firework.style.top = `${posY}px`;

        const animationDuration = Math.random() * 2 + 1;
        const animationDelay = Math.random() * 2;

        firework.style.animationDuration = `${animationDuration}s`;
        firework.style.animationDelay = `-${animationDelay}s`;

        firework.addEventListener("animationend", () => {
            fireworksContainer.removeChild(firework);
        });

        // Call the function to play the firework sound
        playFireworkSound();
    }

    function launchFireworks() {
        setInterval(createFirework, 900);
    }

    launchFireworks();
    tsParticles.load({ preset: "fireworks" });
});
