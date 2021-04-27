
    @csrf
    <div class="form-group mb-3 required">
        <input id="focus" type="text" class="modal-category form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Categoria" required autofocus> 
        <span id="error-name" class="invalid-feedback"></span>
    </div>

    <div class="input-group mb-3">
        <input id="slug-modal" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ old('slug') }}" placeholder="Slug" required autofocus>
        <span id="error-slug" class="invalid-feedback"></span>
    </div>

    <div class="input-group mb-3">
        <input id="section" type="text" class="form-control{{ $errors->has('section') ? ' is-invalid' : '' }}" name="section" value="{{ old('section') }}" placeholder="section" required autofocus>
        <span id="error-section" class="invalid-feedback"></span>
    </div>

    <div class="form-group mb-3">
        <select id="enabled" name="enabled" class="form-control{{ $errors->has('enabled') ? ' is-invalid' : '' }}">
            <option value="">Estado da categoria</option>
            <option value="1" {{ old('enabled')=='1' ? 'selected' : ''  }}>Ativo</option>
            <option value="0" {{ old('enabled')=='0' ? 'selected' : ''  }}>Inativo</option>
        </select>
        <span id="error-enabled" class="invalid-feedback" style="display: block;"></span>
    </div>
