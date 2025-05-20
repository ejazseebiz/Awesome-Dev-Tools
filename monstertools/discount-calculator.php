        <form id="frmDiscount" method="get" action="" class="no-app-loader">
            <div class="box-shadow mb-3 py-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Amount</label>
                            <input class="form-control" name="amount" type="number" step="0.01" id="amount" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Discount Percentage</label>
                            <input class="form-control" name="discount" type="number" step="0.01" id="discount" required />
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" id="calculateDiscount" class="btn btn-outline-primary rounded-pill">
                        Calculate Discount
                    </button>
                </div>
            </div>
        </form>
    <div class="tool-result-wrapper d-none">
        
            <div class="result mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-style mb-0">
                            <tbody>
                                <tr>
                                    <th>Discounted Price</th>
                                    <td>
                                        <div class="text-break" id="discounted-price"></div>
                                    </td>
                                    <td>
                                        <x-copy-target target="discounted-price" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>Savings</th>
                                    <td>
                                        <div class="text-break" id="saving-price"></div>
                                    </td>
                                    <td>
                                        <x-copy-target target="saving-price" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    
    
        <script>
            const APP = function() {
                const resultsElem = document.querySelector('.tool-result-wrapper');
                const calculation = function() {
                        var amount = document.getElementById('amount').value;
                        var discount = document.getElementById('discount').value;

                        if (amount < 0 || discount < 0 || amount == "" || discount == "") {
                            // ArtisanApp.toastError('{{ __('tools.invalidInput') }}')
                            return;
                        }

                        amount = parseFloat(amount);
                        discount = parseFloat(discount);
                        var discounted_price = 0;
                        var saving_price = 0;

                        saving_price = (discount * amount) / 100;
                        discounted_price = amount - saving_price;

                        document.getElementById('discounted-price').innerHTML = discounted_price;
                        document.getElementById('saving-price').innerHTML = saving_price;

                        resultsElem.classList.remove('d-none')
                        resultsElem.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                        // ArtisanApp.hideLoader();
                    },
                    attachEvents = function() {
                        document.getElementById('calculateDiscount').addEventListener('click', () => {
                            calculation()
                        })
                        document.getElementById('frmDiscount').addEventListener('submit', e => {
                            e.preventDefault();
                            calculation()
                        })
                    };

                return {
                    init: function() {
                        attachEvents();
                    }
                }
            }()
            document.addEventListener("DOMContentLoaded", function(event) {
                APP.init();
            });
        </script>


