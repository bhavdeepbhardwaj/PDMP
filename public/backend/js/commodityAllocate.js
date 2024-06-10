// public/js/commodity.js

function CommodityAllocate(id) {
    console.log("CommodityAllocate function called with id:", id);
    alert(id);
    $.ajax({
        type: "GET",
        url: "/commodity-allocate/" + id,
        // If you need to pass additional data, you can use the data property like this:
        // data: { key1: value1, key2: value2 },
        success: function(response) {
            alert(response);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Handle errors here
        }
    });
}


function greetUser(name) {
    alert("Hello, " + name + "!");
}
