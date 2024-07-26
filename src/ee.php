<!--form script for table New Form--> 
<form role="form" id="custom_form" data-toggle="validator" class="shake" autocomplete="off">
    <input type="hidden" id="idicustomform" name="idicustomform" value="1" required>
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label for="text">texto</label>
                <input type="text" maxlength="255" class="form-control" id="text" name="text" placeholder="Ingrese texto" required>
                <div class="help-block with-errors text-danger"></div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label for="emai">email</label>
                <input type="email" maxlength="255" class="form-control" id="emai" name="emai" placeholder="Ingrese email" required>
                <div class="help-block with-errors text-danger"></div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label for="unnumer">un numero</label>
                <input type="number" maxlength="255" class="form-control" id="unnumer" name="unnumer" placeholder="Ingrese un numero" required>
                <div class="help-block with-errors text-danger"></div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label for="passwor">password</label>
                <input type="password" maxlength="255" class="form-control" id="passwor" name="passwor" placeholder="Ingrese password" required>
                <div class="help-block with-errors text-danger"></div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label for="fech">fecha</label>
                <input type="date" maxlength="255" class="form-control" id="fech" name="fech" placeholder="Ingrese fecha" required>
                <div class="help-block with-errors text-danger"></div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label for="fechacontiemp">fecha con tiempo</label>
                <input type="datetime-local" maxlength="255" class="form-control" id="fechacontiemp" name="fechacontiemp" placeholder="Ingrese fecha con tiempo" required>
                <div class="help-block with-errors text-danger"></div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label for="uncolo">un color</label>
                <input type="color" maxlength="255" class="form-control" id="uncolo" name="uncolo" placeholder="Ingrese un color" required>
                <div class="help-block with-errors text-danger"></div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <label for="tiemp">tiempo</label>
                <input type="time" maxlength="255" class="form-control" id="tiemp" name="tiemp" placeholder="Ingrese tiempo" required>
                <div class="help-block with-errors text-danger"></div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="form-group">
                <label for="ur">url</label>
                <input type="url" maxlength="255" class="form-control" id="ur" name="ur" placeholder="Ingrese url" required>
                <div class="help-block with-errors text-danger"></div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="unaseman">una semana</label>
                <input type="week" maxlength="255" class="form-control" id="unaseman" name="unaseman" placeholder="Ingrese una semana" required>
                <div class="help-block with-errors text-danger"></div>
            </div>
        </div>
    </div>
    <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Guardar</button>
    <div id="msgSubmit" class="h3 text-center hidden"></div>
    <div class="clearfix"></div>
</form>