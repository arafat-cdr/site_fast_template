<footer class="bg-dark text-white py-4 mt-auto">
  <div class="container">
    <div class="row">
      <!-- Footer Logo -->
      <div class="col-md-3">
        <img src="<?php echo PUBLIC_URL.'img/website/footer-logo.png'; ?>" alt="footer logo" title="footer logo" class="img-fluid mb-3">
        <p class="small">
          Universe Publishing Group (UniversePG) is an independent international academic publisher.
        </p>
      </div>
      
      <!-- Links -->
      <div class="col-md-2">
        <h5 class="text-uppercase">Links</h5>
        <ul class="list-unstyled">
          <li><a href="<?php echo APP_URL.'home'; ?>" class="text-white">Home</a></li>
          <li><a href="<?php echo APP_URL.'contact-us'; ?>" class="text-white">Contact Us</a></li>
          <li><a href="<?php echo APP_URL.'privacy-policy-for-universepg'; ?>" class="text-white">Privacy Policy</a></li>
          <li><a href="<?php echo APP_URL.'terms-and-conditions'; ?>" class="text-white">Terms of Use</a></li>
          <li><a href="<?php echo APP_URL.'sitemap.xml'; ?>" class="text-white">SiteMap</a></li>
        </ul>
      </div>
      
      <!-- Social Share -->
      <div class="col-md-3 mb-3">
        <h5 class="text-uppercase text-centers">Social Share</h5>
        <ul class="list-unstyled d-flex">
          <li><a href="<?php echo get_social_link('facebook'); ?>" class="text-white me-3">
            <img src="<?php echo PUBLIC_URL.'img/website/facebook.png'; ?>" alt="facebook logo" title="facebook logo" class="img-fluid mb-3">
          </a></li>
          <li><a href="<?php echo get_social_link('twitter'); ?>" class="text-white me-3">
            <img src="<?php echo PUBLIC_URL.'img/website/twitter.png'; ?>" alt="twitter logo" title="twitter logo" class="img-fluid mb-3">
          </a></li>
          <li><a href="<?php echo get_social_link('instagram'); ?>" class="text-white me-3">
            <img src="<?php echo PUBLIC_URL.'img/website/instagram.png'; ?>" alt="instagram logo" title="instagram logo" class="img-fluid mb-3">
          </a></li>
          <li><a href="<?php echo get_social_link('linkedin'); ?>" class="text-white me-3">
            <img src="<?php echo PUBLIC_URL.'img/website/linkedin.png'; ?>" alt="linkedin logo" title="linkedin logo" class="img-fluid mb-3">
          </a></li>
          <li><a href="<?php echo get_social_link('youtube'); ?>" class="text-white me-3">
            <img src="<?php echo PUBLIC_URL.'img/website/youtube.png'; ?>" alt="youtube logo" title="youtube logo" class="img-fluid mb-3">
          </a></li>
        </ul>
      </div>
      
      <!-- Reference -->
<!--       <div class="col-md-3">
        <h5 class="text-uppercase">Reference</h5>
        <ul class="list-unstyled">
          <li><a href="<?php echo APP_URL.'privacy-policy-for-universepg'; ?>" class="text-white">Privacy Policy</a></li>
          <li><a href="<?php echo APP_URL.'terms-and-conditions'; ?>" class="text-white">Terms of Use</a></li>
          <li><a href="#" class="text-white">FAQ</a></li>
          <li><a href="#" class="text-white">Help Center</a></li>
        </ul>
      </div> -->
      
      <!-- Address -->
      <div class="col-md-3">
        <h5 class="text-uppercase">Address</h5>
        <address>
          Universe Publishing Group (UniversePG) <br>
          135 S Vermont Avenue, Los Angeles<br>California, USA <br>
          <a href="tel:+1234567890" class="text-white">+1 234 567 890</a><br>
          <a href="mailto:editorupg@gmail.com" class="text-white">editorupg@gmail.com</a>
        </address>
      </div>
    </div>
    <hr class="bg-white">
    <div class="text-center small">
      &copy; <?php echo date('Y'); ?> universepg.com All Rights Reserved.
    </div>
  </div>
</footer>

