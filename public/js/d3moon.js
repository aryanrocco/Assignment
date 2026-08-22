(() => {
    const canvas = document.getElementById("starfield");
    if (canvas) {
        const ctx = canvas.getContext("2d");
        const stars = Array.from({ length: 140 }, () => ({
            x: Math.random(),
            y: Math.random(),
            r: Math.random() * 1.4 + 0.2,
            a: Math.random(),
            d: Math.random() * 0.008 + 0.002,
        }));

        const resize = () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        };
        resize();
        window.addEventListener("resize", resize);

        const draw = () => {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            stars.forEach((star) => {
                star.a += star.d;
                const alpha = 0.25 + Math.abs(Math.sin(star.a)) * 0.7;
                ctx.fillStyle = `rgba(230, 246, 255, ${alpha})`;
                ctx.beginPath();
                ctx.arc(star.x * canvas.width, star.y * canvas.height, star.r, 0, Math.PI * 2);
                ctx.fill();
            });
            requestAnimationFrame(draw);
        };
        draw();
    }

    const menuBtn = document.querySelector("[data-menu]");
    const links = document.querySelector("[data-nav]");
    menuBtn?.addEventListener("click", () => links?.classList.toggle("open"));

    const nodes = document.querySelectorAll("[data-domain]");
    const title = document.querySelector("[data-domain-title]");
    const summary = document.querySelector("[data-domain-summary]");
    const roles = document.querySelector("[data-domain-roles]");

    const activate = (node) => {
        nodes.forEach((item) => item.classList.remove("active"));
        node.classList.add("active");
        if (title) title.textContent = node.dataset.name || "";
        if (summary) summary.textContent = node.dataset.summary || "";
        if (roles) {
            roles.innerHTML = "";
            (node.dataset.roles || "")
                .split("|")
                .filter(Boolean)
                .forEach((role) => {
                    const chip = document.createElement("span");
                    chip.className = "chip";
                    chip.textContent = role;
                    roles.appendChild(chip);
                });
        }
    };

    nodes.forEach((node) => {
        node.addEventListener("click", () => activate(node));
        node.addEventListener("keydown", (event) => {
            if (event.key === "Enter" || event.key === " ") {
                event.preventDefault();
                activate(node);
            }
        });
    });

    if (nodes[0]) {
        activate(nodes[0]);
    }

    if (new URLSearchParams(window.location.search).get("sent") === "1") {
        const form = document.querySelector("[data-briefing-form]");
        if (form && !form.querySelector(".flash")) {
            const flash = document.createElement("div");
            flash.className = "flash";
            flash.textContent = "Thank you. Vinoth will confirm a convenient time to connect.";
            form.prepend(flash);
        }
    }
})();
