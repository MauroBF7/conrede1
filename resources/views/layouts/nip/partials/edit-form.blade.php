<!-- Formulário de edição de IPs -->
<div style="display: flex; flex-wrap: wrap; gap: 15px;">
    <!-- Primeira linha: IP, Patch Panel, Porta Switch -->
    <div style="flex: 1; min-width: 200px;">
        <label for="ip">IP</label><br>
        <input type="text" name="ip" value="{{ old('ip', $nip->ip ?? '') }}" style="border-radius: 15px; width: 100%;">
    </div>

    <!-- Alteração: Path Panel como select de 1 a 12 -->
    <div style="flex: 1; min-width: 200px;">
        <label for="pathpanel">Patch Panel</label><br>
        <select name="pathpanel" style="border-radius: 15px; width: 100%;">
            @for($i = 1; $i <= 12; $i++)
                <option value="{{ $i }}" {{ old('pathpanel', $nip->pathpanel ?? '') == $i ? 'selected' : '' }}>
                    {{ $i }}
                </option>
            @endfor
        </select>
    </div>

    <!-- Alteração: Porta como select de 1 a 24 -->
    <div style="flex: 1; min-width: 200px;">
        <label for="porta">Porta Patch</label><br>
        <select name="porta" style="border-radius: 15px; width: 100%;">
            @for($i = 1; $i <= 24; $i++)
                <option value="{{ $i }}" {{ old('porta', $nip->porta ?? '') == $i ? 'selected' : '' }}>
                    {{ $i }}
                </option>
            @endfor
        </select>
    </div>

    <!-- Porta Switch -->
    <div style="flex: 1; min-width: 200px;">
        <label for="psw">Porta Switch</label><br>
        <input type="text" name="psw" size="03" style="border-radius: 15px; width: 100%;" value="{{ old('psw', $nip->psw ?? '') }}" pattern="^[A-Za-z][0-9]{1,2}$" title="Deve ser uma letra seguida de até dois números, como 'F23'." placeholder="Ex: F23">
    </div>

    <div style="flex: 1; min-width: 200px;">
        <label for="ponto">Ponto WA</label><br>
        <input type="text" name="ponto" size="03" style="border-radius: 15px; width: 100%;" value="{{ old('ponto', $nip->ponto ?? '') }}">
    </div>

    <!-- Segunda linha: Patrimônio, Responsável -->
    <div style="flex: 1; min-width: 200px;">
        <label for="patrimonio">Patrimônio</label><br>
        <input type="text" name="patrimonio" size="11" style="border-radius: 15px; width: 100%;" value="{{ old('patrimonio', $nip->patrimonio ?? '') }}">
    </div>

    <div style="flex: 1; min-width: 200px;">
        <label for="responsa">Responsável</label><br>
        <input type="text" name="responsa" size="45" style="border-radius: 15px; width: 100%;" value="{{ old('responsa', $nip->responsa ?? '') }}">
    </div>

    <!-- Terceira linha: Divisão, Seção -->
    <div style="flex: 1; min-width: 200px;">
        <label for="divisas_id">Divisão</label><br>
        <select name="divisas_id" style="border-radius: 15px; width: 100%;">
            @foreach($divisas as $divisa)
                <option value="{{ $divisa->id }}"
                        {{ old('divisas_id', $nip->divisas_id ?? '') == $divisa->id ? 'selected' : '' }}>
                    {{ $divisa->sigla }}
                </option>
            @endforeach
            <option value="outro">Sem divisão</option>
        </select>
    </div>

    <div style="flex: 1; min-width: 200px;">
        <label for="secao">Seção</label><br>
        <input type="text" name="secao" size="60" style="border-radius: 15px; width: 100%; margin-bottom: 20px;" value="{{ old('secao', $nip->secao ?? '') }}">
    </div>
</div>