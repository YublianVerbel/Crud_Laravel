<style>
    /* Contenedor principal */
    div {
        max-width: 400px;
        margin: 50px auto;
        font-family: Arial, Helvetica, sans-serif;
        color: #2c3e50;
    }

    /* Título */
    h1 {
        text-align: center;
        margin-bottom: 30px;
        font-weight: 700;
    }

    /* Formulario: card única con sombra */
    form {
        background-color: #fff;
        padding: 25px 30px;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        display: flex;
        flex-direction: column;
        gap: 14px;
        /* menos espacio entre inputs */
    }

    /* Cada grupo label+input */
    form div {
        display: flex;
        flex-direction: column;
    }

    /* Label */
    form label {
        margin-bottom: 5px;
        font-weight: 600;
    }

    /* Inputs */
    form input[type="text"],
    form input[type="number"] {
        padding: 10px 14px;
        border-radius: 8px;
        border: 1px solid #cbd5e1;
        font-size: 15px;
        transition: border-color 0.25s ease;
    }

    form input[type="text"]:focus,
    form input[type="number"]:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 6px rgba(59, 130, 246, 0.4);
    }

    /* Botón: ancho completo, estilo moderno */
    form button[type="submit"] {
        margin-top: 10px;
        width: 100%;
        padding: 14px 0;
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        border: none;
        border-radius: 10px;
        color: white;
        font-weight: 700;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    form button[type="submit"]:hover {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        transform: translateY(-2px);
        box-shadow: 0 6px 14px rgba(37, 99, 235, 0.5);
    }

    /* Mensaje éxito */
    div>div {
        max-width: 400px;
        margin: 20px auto 0;
        padding: 12px 20px;
        background-color: #e6fffa;
        color: #065f46;
        border: 1px solid #a7f3d0;
        border-radius: 8px;
        font-weight: 600;
        text-align: center;
    }
</style>

<div>
    <h1>Editar producto</h1>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nombre:</label>
            <input type="text" name="name" value="{{ $product->name }}" required>
        </div>

        <div>
            <label for="price">Precio:</label>
            <input type="number" step="0.01" name="price" value="{{ $product->price }}" required>
        </div>

        <button type="submit">Actualizar</button>
    </form>

</div>
