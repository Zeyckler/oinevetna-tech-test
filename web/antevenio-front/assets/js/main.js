/**
 * Send the data to backend to save the new expense
 *
 * @param {array} fieldsArray
 * @param {JQuery} formObject
 */
function sendToBackend(fieldsArray, formObject) {
    $.ajax({
        url: "http://www.antevenio.dev/app_dev.php/new-expense/",
        dataType: "json",
        data: fieldsArray,
        type: "POST",
        success: function () {
            window.alert("Expense added");
            formObject.trigger("reset");
        },
        error: function () {
            window.alert("An error occurred. Please, retry later.");
        }
    });
}

/**
 * Retrieve and write the table with the expense data
 */
function expenseListBackend() {
    var items = [];
    $.getJSON("http://www.antevenio.dev/app_dev.php/expense-list/", function (data) {
        $.each(data, function (key, val) {
            items.push("<tr><td>" + val.id + "</td><td>" + val.description + "</td><td>" + val.expense + "&euro;</td></tr>");
        });
        $(".table tbody").append(items.join(""));
    });
}


