@extends('layout.add')

@section('content')
<div class="uk-offcanvas-content" >
    
    <!-- Main Content -->
    <div class="uk-container uk-margin-large-top">
        <h1 class="uk-heading-line"><span>Dashboard</span></h1>
        
        <!-- Statistics Charts -->
        <div class="uk-margin-large-top">
            <h3 class="uk-heading-line"><span>Statistics Overview</span></h3>
            <div class="uk-grid uk-grid-stack" uk-grid>
                <div class="uk-width-1-2@s">
                    <div class="uk-card uk-card-default uk-card-body uk-card-small">
                        <h3 class="uk-card-title">Sales Overview</h3>
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
                <div class="uk-width-1-2@s">
                    <div class="uk-card uk-card-default uk-card-body uk-card-small">
                        <h3 class="uk-card-title">User Activity</h3>
                        <canvas id="activityChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Dashboard Overview -->
        <div class="uk-child-width-1-3@m uk-grid-small uk-grid-match uk-margin-large-top" uk-grid>
            <div class="uk-grid-item-match">
                <div class="uk-card uk-card-default uk-card-body">
                    <h3 class="uk-card-title">Products</h3>
                    <p>Manage your products here.</p>
                    <a class="uk-button uk-button-primary" href="#">Go to Product Management</a>
                </div>
            </div>
            <div class="uk-grid-item-match">
                <div class="uk-card uk-card-default uk-card-body">
                    <h3 class="uk-card-title">Categories</h3>
                    <p>Manage your categories here.</p>
                    <a class="uk-button uk-button-primary" href="#">Go to Category Management</a>
                </div>
            </div>
            <div class="uk-grid-item-match">
                <div class="uk-card uk-card-default uk-card-body">
                    <h3 class="uk-card-title">Orders</h3>
                    <p>Manage your orders here.</p>
                    <a class="uk-button uk-button-primary" href="#">Go to Order Management</a>
                </div>
            </div>
        </div>

        <div class="uk-child-width-1-3@m uk-grid-small uk-grid-match uk-margin-large-top" uk-grid>
            <div class="uk-grid-item-match">
                <div class="uk-card uk-card-default uk-card-body">
                    <h3 class="uk-card-title">Comments</h3>
                    <p>Manage user comments here.</p>
                    <a class="uk-button uk-button-primary" href="#">Go to Comment Management</a>
                </div>
            </div>
            <div class="uk-grid-item-match">
                <div class="uk-card uk-card-default uk-card-body">
                    <h3 class="uk-card-title">Statistics</h3>
                    <p>View detailed statistics here.</p>
                    <a class="uk-button uk-button-primary" href="#">Go to Statistics</a>
                </div>
            </div>
            <div class="uk-grid-item-match">
                <div class="uk-card uk-card-default uk-card-body">
                    <h3 class="uk-card-title">Users</h3>
                    <p>Manage user accounts here.</p>
                    <a class="uk-button uk-button-primary" href="#">Go to User Management</a>
                </div>
            </div>
        </div>
    </div>
    @endsection