<a id="backToTop" data-toggle="tooltip" data-title="Scroll to Top" title="Scroll to Top"><i class="fas fa-angle-double-up"></i></a>

<script>
    $(document).ready(function() {
        // Code from https://stackoverflow.com/questions/8218159/javascript-check-if-page-is-at-the-top
        var goToTop = document.querySelector('#backToTop');
        goToTop.addEventListener("click", function(e) {
            window.scroll({
                top: 0,
                left: 0,
                behavior: 'smooth'
            });
            //scroll smoothly back to the top of the page
        });
        window.addEventListener("scroll", function() {
            if (window.scrollY == 0) {
                //user is at the top of the page; no need to show the back to top button
                goToTop.style.display = "";
            } else {
                goToTop.style.display = "block";
            }
        });
    });
</script>
<script src='https://storage.ko-fi.com/cdn/scripts/overlay-widget.js'></script>
<script>
  kofiWidgetOverlay.draw('cerni', {
    'type': 'floating-chat',
    'floating-chat.donateButton.text': 'Support Cerni',
    'floating-chat.donateButton.background-color': '#ca4dff79', 
    'floating-chat.donateButton.text-color': '#fef5ffff'
  });
</script>

<style>
    #backToTop {
        color: #eee;
        cursor: pointer;
        padding: 0.25em 0.75em;
        position: fixed;
        bottom: 1em;
        right: 0.75em;
        display: none;
        transition: all 0.5s ease;
        opacity: 0.75;
        background-color: rgba(0, 0, 0, .5);
        font-size: 1.5em;
        border-radius: 50%;
    }

    #backToTop:hover {
        color: #fff;
        opacity: 1;
        transition: all 0.5s ease;
    }

.floating-chat-kofi-popup-iframe {
    box-shadow: 0 8px 30px 10px rgb(96 46 123 / 25%), 0 2px 10px rgb(86 0 255 / 30%) !important;
}
</style>