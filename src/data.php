<?php include './headers.php'; ?>
<div class="card">
    <div class="card-body">

        <form id="frm-example" action="/path/to/your/script" method="POST">

            <div class="table-responsive">
                <table id="example" class="display table table-striped table-bordered table-hover table-sm dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead class="table-primary text-light">
                        <tr>
                            <th><input name="select_all" value="1" id="example-select-all" type="checkbox" /></th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Extn.</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Extn.</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <hr>

            <p>Press <b>Submit</b> and check console for URL-encoded form data that would be submitted.</p>

            <p><button>Submit</button></p>

            <b>Data submitted to the server:</b><br>
            <pre id="example-console">
            </pre>
        </form>
    </div>
</div>
<?php include './footer.php'; ?>
<script>
    $(document).ready(function () {
        var table = $('#example').DataTable({
            'ajax': 'https://api.myjson.com/bins/1us28',
            'columnDefs': [{
                    'targets': 0,
                    'searchable': false,
                    'orderable': false,
                    'className': 'dt-body-center',
                    'render': function (data, type, full, meta) {
                        return '<input type="checkbox" name="id[]" value="'
                                + $('<div/>').text(data).html() + '">';
                    }
                }],
            'order': [1, 'asc']
        });

        // Handle click on "Select all" control
        $('#example-select-all').on('click', function () {
            // Check/uncheck all checkboxes in the table
            var rows = table.rows({'search': 'applied'}).nodes();
            $('input[type="checkbox"]', rows).prop('checked', this.checked);
        });

        // Handle click on checkbox to set state of "Select all" control
        $('#example tbody').on('change', 'input[type="checkbox"]', function () {
            // If checkbox is not checked
            if (!this.checked) {
                var el = $('#example-select-all').get(0);
                // If "Select all" control is checked and has 'indeterminate' property
                if (el && el.checked && ('indeterminate' in el)) {
                    // Set visual state of "Select all" control 
                    // as 'indeterminate'
                    el.indeterminate = true;
                }
            }
        });

        $('#frm-example').on('submit', function (e) {
            var form = this;

            // Iterate over all checkboxes in the table
            table.$('input[type="checkbox"]').each(function () {
                // If checkbox doesn't exist in DOM
                if (!$.contains(document, this)) {
                    // If checkbox is checked
                    if (this.checked) {
                        // Create a hidden element 
                        $(form).append(
                                $('<input>')
                                .attr('type', 'hidden')
                                .attr('name', this.name)
                                .val(this.value)
                                );
                    }
                }
            });

            // FOR TESTING ONLY

            // Output form data to a console
            $('#example-console').text($(form).serialize());
            console.log("Form submission", $(form).serialize());

            // Prevent actual form submission
            e.preventDefault();
        });
    });
</script>