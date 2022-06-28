@extends('layout.lawyerlayout')
@section('title')
Dashboard
@endsection
@section('content')
    <main>
        <div class="profileDiv fixedDiv">
            <div class="mainFixedService">
                <h5>Earnings</h5>
                <div class="earning">
                    <div class="opertionDiv">
                        <div class="availableBalance">
                            <h4>250</h4>
                            <p>Available Balance</p>
                        </div>
                        <div class="multiBtn">
                            <span>Withdraw</span>
                            <span>Payment Setting</span>
                        </div>
                    </div>
                    <div class="readingItems">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="commonDiv">
                                    <h4>$10K+</h4>
                                    <p>Total Earnings</p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="commonDiv">
                                    <h4>$900</h4>
                                    <p>Pending</p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="commonDiv">
                                    <h4>200</h4>
                                    <p>Clients</p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="commonDiv">
                                    <h4>70</h4>
                                    <p>Fixed Services Sold</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line">
                        <img src="../assets/img/line.png" alt="" class="img-fluid">
                    </div>
                    <div class="graphDiv">
                        <div class="graphHeader">
                            <div class="reading">
                                <h4>$ 200</h4>
                                <p>Daily average</p>
                            </div>
                            <select name="" id="">
                                <option value="Weekly">Weekly</option>
                            </select>
                        </div>
                        <img src="../assets/img/graph.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
