//////////// カテゴリー編集機能 ////////////
let edit = document.querySelector('.edit');
let categoryAddDelete = document.querySelector('.category_add_delete');
let addCategory = document.querySelector('.add_category');
let add = document.querySelector('.add');
let addRed = document.querySelector('.add_red');
let desCategory = document.querySelector('.des_category');
let des = document.querySelector('.des');
let desRed = document.querySelector('.des_red');
// let categoryCancel = document.querySelectorAll('.category_cancel');
let overlay = document.querySelector('.overlay');

// 表示・非表示
edit.addEventListener('click', function() {
    if (categoryAddDelete.classList.contains('show')) {
        categoryAddDelete.classList.remove('show');
        overlay.classList.add('fill');
    }
});

overlay.addEventListener('click', function() {
    if (!categoryAddDelete.classList.contains('show')) {
        categoryAddDelete.classList.add('show');
        overlay.classList.remove('fill');
    }
});

function cancel() {
    if (!categoryAddDelete.classList.contains('show')) {
        categoryAddDelete.classList.add('show');
        overlay.classList.remove('fill');
    }
}

// 追加・削除切り替え
add.addEventListener('click', function() {
    if(addCategory.classList.contains('show')) {
        addCategory.classList.remove('show');
        desCategory.classList.add('show');
    }
});

des.addEventListener('click', function() {
    if(!addCategory.classList.contains('show')) {
        addCategory.classList.add('show');
        desCategory.classList.remove('show');
    }
});



//////////// 画像表示機能 ////////////
let inventoryNames = document.querySelectorAll('.inventoryName');
let inventoryImageArea = document.querySelectorAll('.inventoryImageArea');
let inventoryImage = document.querySelectorAll('.inventoryImage');
// let overlay = document.querySelector('.overlay');

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