function showProductModal(name, category, description, image) {
    document.getElementById('modalName').textContent = name;
    document.getElementById('modalCategory').textContent = category;
    document.getElementById('modalDesc').textContent = description;
    document.getElementById('modalImage').src = image;
    
    var modal = new bootstrap.Modal(document.getElementById('productModal'));
    modal.show();
}

document.getElementById("sendEmail").addEventListener("click", function() {
    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let message = document.getElementById("message").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let subject = document.getElementById("subject").value.trim() || `Contact Form Submission (${name})`;
    
    let recipient = document.getElementById("recipient").value;
  
    if (!name || !email || !message) {
        alert("Please fill out all required fields before sending the email.");
        return;
    }
  
    const today = new Date();
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    const formattedDate = today.toLocaleDateString('en-US', options);
    
    let bodyText = `${name}
${email}
${phone ? phone + '\n' : ''}
${formattedDate}

${recipient}
Rosal Marble Supply
774 corner St. Jude, Acres Bukang Liwayway
Cebu City, Philippines

Dear Rosal Marble Supply Team,

${message}

Sincerely,

${name}
${email}
${phone ? phone : ''}`;
    
    let encodedSubject = encodeURIComponent(subject);
    let encodedBody = encodeURIComponent(bodyText);
  
    let mailtoLink = `https://mail.google.com/mail/?view=cm&fs=1&to=${recipient}&su=${encodedSubject}&body=${encodedBody}`;
  
    window.open(mailtoLink, '_blank');
});

function getQuote() {
    const productName = document.getElementById('modalName').textContent;
    const description = document.getElementById('modalDesc').textContent;
    
    window.location.href = 'get_quoted.php?subject=' + encodeURIComponent(productName) + '&message=' + encodeURIComponent(description);
}