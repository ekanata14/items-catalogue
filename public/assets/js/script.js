// Buttons
const addItemButton = document.querySelector("#addItemButton");
const updateItemButton = document.querySelectorAll("#updateItemButton");
const addRecordButton = document.querySelector("#addRecordButton");
const addStockButton = document.querySelector("#addStockButton");
const addInOutButton = document.querySelector("#addInOutButton");
const addCategoryButton = document.querySelector("#addCategoryButton");
const updateCategoryButton = document.querySelectorAll("#updateCategoryButton");

// Modal Anatomies
const modalContainer = document.querySelector("#modal");
const modalLabel = document.querySelector("#modalLabel");
const modalBody = document.querySelector("#modalBody");
const modalForm = document.querySelector("#modalForm");
const buttonSubmit = document.querySelector("#buttonSubmit");

const modalStock = document.querySelector("#addStockModa")
const modalStockForm = document.querySelector("#addStockForm");
const modalInputStockId = document.querySelector("#itemStockId");

// Inputs
const inputName = document.querySelector("#itemName");
const selectCategory = document.querySelector("#category");
const inputPrice = document.querySelector("#itemPrice");
const inputSellPrice = document.querySelector("#itemSellPrice");

const inputCatName = document.querySelector("#categoryName");

const put = document.createElement("input");
Object.assign(put, {
    type : 'hidden',
    name : '_method',
    value : 'PUT'
});



$(document).ready(function(){

    $(addItemButton).on("click", ()=>{
        modalLabel.innerHTML = "Add Item";
        modalForm.setAttribute("action", "items");
        buttonSubmit.innerHTML = "Add";
    });

    // Because there are many update buttons, use for each to make the data can be sent to all of them
    updateItemButton.forEach(updateButton => {
        $(updateButton).on("click", ()=>{
            let id = $(updateButton).attr("data-id");
            let categoryId = $(updateButton).attr("data-catid");
            let name = $(updateButton).attr("data-name");
            let price = $(updateButton).attr("data-price");
            let sellPrice = $(updateButton).attr("data-sellPrice");

            modalLabel.innerHTML = "Update Item";
            modalForm.setAttribute("action", "items/" + id);
            buttonSubmit.innerHTML = "Update";
            modalForm.append(put);

            inputName.setAttribute("value", name);
            selectCategory.setAttribute("value", categoryId);
            inputPrice.setAttribute("value", price);
            inputSellPrice.setAttribute("value", sellPrice);

            document.cookie(`catid=${categoryId}`);
        });
    });

    $(addRecordButton).on("click", ()=>{
        modalLabel.innerHTML = "Add Record";
        modalForm.setAttribute("action", "sale");
        buttonSubmit.innerHTML = "Add";
    });

    $(addInOutButton).on("click", ()=>{
        modalLabel.innerHTML = "Add In Out";
        modalForm.setAttribute("action", "inout");
        buttonSubmit.innerHTML = "Add";
    });

    $(addCategoryButton).on("click", ()=>{
        modalLabel.innerHTML = "Add Category";
        modalForm.setAttribute("action", "category");
        buttonSubmit.innerHTML = "Add";
    });

    updateCategoryButton.forEach(updateCatButton => {
        $(updateCatButton).on("click", ()=>{
            let id = $(updateCatButton).attr("data-id");
            let name = $(updateCatButton).attr('data-name');

            modalLabel.innerHTML = "Update Category";
            modalForm.setAttribute("action", "category/" + id);
            modalForm.append(put);
            buttonSubmit.innerHTML = "Update";

            inputCatName.setAttribute("value", name);

        })
    })

})
