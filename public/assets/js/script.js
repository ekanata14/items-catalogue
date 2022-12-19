// Modal Anatomies
const addItemButton = document.querySelector("#addItemButton");
const updateItemButton = document.querySelectorAll("#updateItemButton");

const modalContainer = document.querySelector("#modal");
const modalLabel = document.querySelector("#modalLabel");
const modalBody = document.querySelector("#modalBody");
const modalForm = document.querySelector("#modalForm");
const buttonSubmit = document.querySelector("#buttonSubmit");

const inputName = document.querySelector("#itemName");
const inputPrice = document.querySelector("#itemPrice");
const inputSellPrice = document.querySelector("#itemSellPrice");

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
            let name = $(updateButton).attr("data-name");
            let price = $(updateButton).attr("data-price");
            let sellPrice = $(updateButton).attr("data-sellPrice");

            modalLabel.innerHTML = "Update Item";
            modalForm.setAttribute("action", "items/" + id);
            buttonSubmit.innerHTML = "Update";
            modalForm.append(put);

            inputName.setAttribute("value", name);
            inputPrice.setAttribute("value", price);
            inputSellPrice.setAttribute("value", sellPrice);
        });
    });
})
