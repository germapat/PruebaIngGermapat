
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Documento</label>
                    <input requied type="text" readonly="true" name="documento" value="{{$documento}}">
                </div>
                <div class="form-group">
                    <label for="">Nombres</label>
                    <input requied type="text" readonly="true" name="Nombre" value="{{$nombres}}">
                </div>
                <div class="form-group">
                    <label for="">Apellidos</label>
                    <input requied type="text" readonly="true" name="Apellidos" value="{{$apellidos}}">
                </div>
                <div class="form-group">
                    <label for="">Referente de pago</label>
                    <input requied type="text" readonly="true" name="Referente_pago" value="{{$referente_pago}}">
                </div>
            </div>
                {{ $slot }}
