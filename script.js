document.addEventListener('DOMContentLoaded', function() {
    const productModal = document.getElementById('productModal');
    
    productModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        
        const productId = button.getAttribute('data-product-id');
        const productName = button.getAttribute('data-product-name');
        const productDesc = button.getAttribute('data-product-desc');
        const productImage = button.getAttribute('data-product-image');
        const productOrigin = button.getAttribute('data-product-origin');
        const productFinish = button.getAttribute('data-product-finish');
        
        const modalTitle = productModal.querySelector('.modal-title');
        const modalProductName = document.getElementById('modalProductName');
        const modalProductDesc = document.getElementById('modalProductDesc');
        const modalProductImage = document.getElementById('modalProductImage');
        const modalProductOrigin = document.getElementById('modalProductOrigin');
        const modalProductFinish = document.getElementById('modalProductFinish');
        const modalQuoteBtn = document.getElementById('modalQuoteBtn');
        
        modalTitle.textContent = 'Product Details';
        modalProductName.textContent = productName;
        modalProductDesc.textContent = productDesc;
        modalProductImage.src = productImage;
        modalProductImage.alt = productName;
        modalProductOrigin.textContent = productOrigin;
        modalProductFinish.textContent = productFinish;
        
        modalQuoteBtn.setAttribute('data-product-id', productId);
        modalQuoteBtn.setAttribute('data-product-name', productName);
        
        modalQuoteBtn.onclick = function(e) {
            e.preventDefault();
            alert(`Request a quote for ${productName}. We'll contact you shortly!`);
        };
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const pageLinks = document.querySelectorAll('.page-link');
    
    pageLinks.forEach(link => {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        const pageNumber = this.getAttribute('data-page');
        
        document.querySelectorAll('[id^="gallery-page-"]').forEach(page => {
          page.classList.add('d-none');
        });
        
        document.querySelectorAll('.page-item').forEach(item => {
          item.classList.remove('active');
        });
        
        document.getElementById(`gallery-page-${pageNumber}`).classList.remove('d-none');
        this.parentElement.classList.add('active');
      });
    });
  });