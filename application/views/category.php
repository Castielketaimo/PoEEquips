<h1>Category Maintenance!</h1>
<script>
    /*
    when page loads, we populate the dropdown menu with all the categories in the database
    */
    $().ready(function() {
        $.getJSON("{urlLink}info/category", function (data) {
            $.each(data, function (key, val) {
                $("#CategoryDropDown").append('<option value="' + val.CategoryId + '">' + val.Name + '</option>');
            });
        });
        $( "#clearbtn" ).click(function() {
            location.reload();
        });
    });
    $(function(){
        // bind change event to select
        $('#CategoryDropDown').on('change', function () {
            var url = $(this).val(); // get selected value
            if (url) { // require a URL
                window.location = "/Category/edit/" + url; // redirect
            }
            return false;
        });
    });
</script>

<div id="body">
    <select name="Category" id="CategoryDropDown">
        <a href="/Catalog"><option disabled selected value>Categories</option></a>
    </select>
</div>