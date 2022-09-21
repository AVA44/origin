// let inventoryNames = document.querySelectorAll('.inventoryName');
// let imageUrls = document.querySelectorAll('inventoryImageUrl');
// let inventoryImageArea = document.querySelector('inventoryImageArea');
// for (let i = 0; i < inventoryNames.length; i++) {
//     const inventoryName = inventoryNames[i];
//     // console.log(inventoryName);
    
//     inventoryName.addEventListener('click', () => {
//         let image = document.createElement('img');
//         let imageUrl = imageUrls[i];
//         image.src = "{{ Storage::disk('s3')->url(" + imageUrls[i] + ")}}";
//         image.alt = "商品画像";
        
//         console.log(image);
//         // inventoryImageArea.appendChild('image');
//     })
// }


let inventoryNames = document.querySelectorAll('.inventoryName');
let inventoryImageArea = document.querySelectorAll('.inventoryImageArea');
let inventoryImage = document.querySelectorAll('.inventoryImage');
let overlay = document.querySelector('.overlay');

for (let i = 0; i < inventoryNames.length; i++) {
    inventoryNames[i].addEventListener('click', function() {
        if (inventoryImageArea[i].classList.contains('show')){
            inventoryImageArea[i].classList.remove('show');
            inventoryImage[i].classList.remove('show');
            overlay.classList.add('fill');
            inventoryImageArea[i].animate(
            	{
                	opacity: ["0", "1"],
            	},
            	{
            		duration: 100,
            		fill: 'forwards'
                }
            );
        }
    });
    
    overlay.addEventListener('click', function() {
        if (!inventoryImageArea[i].classList.contains('show')) {
            inventoryImageArea[i].animate(
            	{
                	opacity: ["1", "0"],
            	},
            	{
            		duration: 100,
            		fill: 'forwards'
                }
            );
            overlay.classList.remove('fill');
            setTimeout(function () {
                inventoryImageArea[i].classList.add('show');
                inventoryImage[i].classList.add('show');
            }, 501);
        }
    });
}