// Modal Anatomies
const addItemButton = document.querySelector("#addItemButton");
const updateItemButton = document.querySelectorAll("#updateItemButton");
const addRecordButton = document.querySelector("#addRecordButton");
const addStockButton = document.querySelector("#addStockButton");
const addInOutButton = document.querySelector("#addInOutButton")

const modalContainer = document.querySelector("#modal");
const modalLabel = document.querySelector("#modalLabel");
const modalBody = document.querySelector("#modalBody");
const modalForm = document.querySelector("#modalForm");
const buttonSubmit = document.querySelector("#buttonSubmit");

const modalStock = document.querySelector("#addStockModa")
const modalStockForm = document.querySelector("#addStockForm");
const modalInputStockId = document.querySelector("#itemStockId");

const inputName = document.querySelector("#itemName");
const selectCategory = document.querySelector("#category");
const inputPrice = document.querySelector("#itemPrice");
const inputSellPrice = document.querySelector("#itemSellPrice");

const put = document.createElement("input");

// const total = document.querySelectorAll('#total');
// let result = 0;

// total.forEach((item)=>{
//     result += parseInt(item.innerHTML);
// })

// const grandTotal = document.querySelector('#grandTotal');
// grandTotal.innerHTML = result;

Object.assign(put, {
    type : 'hidden',
    name : '_method',
    value : 'PUT'
});



$(document).ready(function(){
    
    // total.forEach(t =>{
    //     $(console.log(t).value);
    // });

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

    $(addStockButton).on("click", ()=>{
        let id = $(addStockButton).attr("data-id");
        modalInputStockId.value = id;
        modalStockForm.setAttribute("action", `inout/${id}`);
    });
})
