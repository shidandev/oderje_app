<div class="container-fluid" style="margin-bottom:50px">
    <div class="row my-3 justify-content-center">
        <div class="col-xl-6 col-12">
            <select class="form-control">
                <option>Main Account</option>
                <option>Rewards</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-12">
            <div class="card border-white">
                <div class="card-body text-center">
                    <p>
                        Current Balance
                    </p>
                    <span id="currency">
                        RM&nbsp;
                    </span>
                    <span class="mr-n2" id="amount-big" style="font-size:42px">
                        1,000,000
                    </span>
                    <span class="align-bottom">&sdot;</span>
                    <span id="amount-small">
                        99
                    </span>
                </div>
                <div class="card-footer bg-white text-center" style="border-color:#FF6600">
                    <span id="accountName">Muhammad Amin bin Mohd Faudzi</span>
                    <br>
                    <span id="accountNumber">10011888</span>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-12">
            <div class="card border-white">
                <div class="card-body my-n2">
                <small>
                    charge : RM 0.50
                    <br>
                    period : Next business day
                </small>
            </div>
                <div class="card-body" style="background-color:azure">
                    <div class="row">
                        <div class="col-12 mb-2 text-center">
                            <form action="" class="text-center mb-3">
                                <label for="Money" class="my-2"><b>Withdraw Amount</b>&nbsp;&#58;&nbsp;(RM)</label>
                                <input id="Money" class="form-control form-control-lg text-center" type="text"
                                    style="font-size:xx-large" value="1.00">
                            </form>
                            <b>Withdraw to</b>&nbsp;&#58;
                        </div>
                        <div class="col-12 text-center text-md-left">
                            <b>Account Holder</b>
                            <br>
                            <span id="bankAccountHolder">Muhammad Amin bin Mohd Faudzi</span>
                            <br>
                            <b>Bank Name</b>
                            <br>
                            <span id="bankName">Maybank</span>
                            <br>
                            <b>Account Number</b>
                            <br>
                            <span id="bankAccountNumber">107246077014</span>
                        </div>
                        <div class="col-12 mt-4 text-center">
                            <button class="btn btn-sm text-white"
                                style="background-color:#FF6600;border-color:#FF6600;width:120px">
                                Proceed&nbsp;&nbsp;<i id="reloadProceedButton" class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>