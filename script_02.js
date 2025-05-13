function showProductModal(name, category, description, image) {
    document.getElementById('modalName').textContent = name;
    document.getElementById('modalCategory').textContent = category;
    document.getElementById('modalDesc').textContent = description;
    document.getElementById('modalImage').src = image;
    
    var modal = new bootstrap.Modal(document.getElementById('productModal'));
    modal.show();
}