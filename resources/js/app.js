import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('projectGallery', () => ({
    open: false,

    async openProject(slug) {

        console.log("Opening:", slug);

        this.open = true;

        const content = document.getElementById("project-content");

        content.innerHTML = `
            <div class="p-20 text-center">
                Loading...
            </div>
        `;

        try {

            const url = `${window.location.origin}/project-modal/${slug}`;

            console.log("Fetching:", url);

            const response = await fetch(url);

            console.log("Status:", response.status);

            const html = await response.text();

            console.log(html.substring(0, 200));

            content.innerHTML = html;
            console.log(content.innerHTML);

        } catch (error) {

            console.error(error);

        }
    },

    close() {
        this.open = false;
    },
}));

Alpine.start();