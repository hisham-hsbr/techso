<script>
    document
        .getElementById("reload-button")
        .addEventListener("click", function() {
            this.classList.add("spin");
            setTimeout(() => {
                this.classList.remove("spin");
            }, 3000); // Duration of the spin animation
        });
</script>
