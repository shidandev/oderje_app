class BasketByMerchant {
    constructor(n) {
        this.m_id = n.m_id;
        this.m_name = n.m_name;
        this.location = n.m_location;
        this.basket = n.basket;
        // this.package = array();

    }

    BasketByMerchantView() {
        var date = new Date();
        var temp = date.toString();

        var html = '';

        html += '	<div class="card border-white">';
        html += '		<div class="card-header border-light" id="headingStore1" data-toggle="collapse" data-target="#collapseStore' + this.m_id + '" aria-expanded="false" aria-controls="collapseStore1" style="background-color:#EDF1FF">';
        html += '			<div class="form-check">';
        html += '				<input class="form-check-input storeCheck1 m_id" type="checkbox" value="' + this.m_id + '" >';
        html += '  				<label class="form-check-label" for="storeCheck1">';
        html += '					<span id="store-name">' + this.m_name + '</span>';
        html += '  				</label><br>';
        html += '  				<span id="store-location">';
        html += '    				<small>' + this.location + '</small>';
        html += '  				</span>';
        html += '  				<i class="fas fa-chevron-down fa-xs float-right text-secondary"></i>';
        html += '			</div>';
        html += '		</div>';
        html += '		<div id="collapseStore' + this.m_id + '" class="collapse" aria-labelledby="headingStore1" data-parent="#accordianGeneralStore">';
        html += '			<div class="card-body">';
        html += '  				<div class="row">';
        // html += '    				<div class="col-xl-3 col-md-6 load list row">';

        for (let i = 0; i < this.basket.length; i++) {
            if (this.basket[i].type == "product") {
                var temp = new ProductBasket(this.basket[i]);
                html += temp.ProductBasketView();

            }

        }

        // html += '					</div>';
        html += '				</div>';
        html += '			</div>';
        html += '		</div>';
        html += '	</div>';

        return html;

    }

}