 <footer class="py-4 mt-auto text-center" style="background: rgba(10,10,20,0.5); color: #aaa;">
   <div class="container">
     <div class="row d-flex" style="justify-content: space-between;">
       <div class="col-lg-4 col-sm-12">
         <p class="mb-0">&copy; <?= date('Y') . ' ' . APP_NAME ?>. All Rights Reserved. </p>
       </div>
       <div class="col-lg-4 col-sm-12">
         <p><i class="bi bi-gem mx-1 text-info"></i> Powered by <a href="https://techsolutions.jongibrandz.co.za" target="_blank">Jongi Brands Tech Solutions</a>.</p>
       </div>
       <div class="col-lg-4 col-sm-12">
         <?= Util::displayLegalPages() ?>
       </div>
     </div>
   </div>
 </footer>

 <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
 <script src="<?= ROOT . '/assets/js/main.js' ?>"></script>
 <script src="<?= ROOT . '/assets/js/frontend.js' ?>"></script>
 </body>

 </html>