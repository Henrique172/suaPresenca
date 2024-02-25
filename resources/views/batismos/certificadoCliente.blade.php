<!-- suaView.blade.php -->

<!-- Botão para abrir a modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#meuModal">Certificado</button>

<!-- Modal HTML -->
<div class="modal fade" id="meuModal" tabindex="-1" role="dialog" aria-labelledby="meuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="meuModalLabel">Minha Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Usando as variáveis do controller -->
                <p>{{ $valor1 }}</p>
                <p>{{ $valor2 }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Adicione o JavaScript necessário para Bootstrap (se ainda não estiver incluído) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
