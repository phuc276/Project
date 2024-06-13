<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
</head>
<body>
    <h2>Order</h2>
    <div class="table-responsive cart_info">
        <table border="1" class="table table-condensed">
            <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description">Name</td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                </tr>
            </thead>
            <tbody>

                @foreach($data['body'] as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['price'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td class="cart_total">
                        <p class="cart_total_price">${{ $item['price'] * $item['quantity'] }}</p>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <ul>
            <li>Cart Sub Total <span>$59</span></li>
            <li>Eco Tax <span>$2</span></li>
            <li>Shipping Cost <span>Free</span></li>
            <li id="total-cart">Total <span>${{ $data['total'] }}</span></li>
        </ul>
    </div>
</body>
</html>
