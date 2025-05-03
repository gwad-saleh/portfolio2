document.addEventListener('DOMContentLoaded', () => {
    loadFlowers();
});

document.getElementById('flower-image').addEventListener('change', function(e) {
    if (this.files && this.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('image-preview').src = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
    }
});

document.getElementById('flower-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData();
    formData.append('name', document.getElementById('flower-name').value);
    formData.append('price', document.getElementById('flower-price').value);
    
    const imageFile = document.getElementById('flower-image').files[0];
    if (imageFile) {
        formData.append('image', imageFile);
    }
    
    const flowerId = document.getElementById('flower-id').value;
    const url = flowerId 
        ? `api/flowers.php?action=update&id=${flowerId}`
        : 'api/flowers.php?action=add';
    
    try {
        const response = await fetch(url, {
            method: 'POST',
            body: formData
        });
        
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        
        const result = await response.json();
        console.log('Success:', result);
        // إعادة تحميل القائمة أو إظهار رسالة نجاح
        loadFlowers();
        
    } catch (error) {
        console.error('Error:', error);
        // إظهار رسالة خطأ للمستخدم
        alert('حدث خطأ أثناء حفظ البيانات: ' + error.message);
    }
});

function loadFlowers() {
    // كود لتحميل قائمة الزهور
    fetch('api/flowers.php?action=getAll')
        .then(response => response.json())
        .then(data => {
            // عرض البيانات في الواجهة
        })
        .catch(error => console.error('Error loading flowers:', error));
}
function confirmDelete(flowerName) {
    return confirm("هل أنت متأكد من حذف الزهرة: " + flowerName + "?");
  }
  
  
  
 