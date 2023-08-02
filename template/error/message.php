<section id="error" class="error mt-4">
    <div class="container">
        <div class="mb-3">
            <?= $this->content ?>
        </div>
        <?php if ($this->url) { ?>
            <div class="redirect">
                <b>9</b>秒后跳转到<a href="<?= $this->url ?>">新页面</a>
            </div>
        <?php } ?>
    </div>
</section>

<?php if ($this->url) { ?>
    <script type="text/javascript">
        (function() {
            var seconds = 9;
            var countdown = document.querySelector('.redirect b');
            var interval = setInterval(function() {
                seconds--;
                countdown.innerHTML = seconds;
                if (seconds == 0) {
                    clearInterval(interval);
                    location.href = '<?= $this->url ?>';
                }
            }, 1000);
        })()
    </script>
<?php } ?>