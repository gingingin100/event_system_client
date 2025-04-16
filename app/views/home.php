<body>
    <main>
        <div class="landing-container">
            <h1>Welcome to the Event Management System</h1>
            <p>
                This platform allows users to effortlessly manage and register for events. 
                From organizing professional workshops to signing up for exciting experiences, 
                our system streamlines event handling with secure user authentication and a robust RESTful API.
            </p>

            <div class="buttons">
                <a href="/<?php echo APP_ROOT_DIR; ?>/event_dash" class="dashboard-card event-card">
                    <h2>Event Dashboard</h2>
                    <p>Create, view, and manage your events efficiently.</p>
                </a>

                <a href="/<?php echo APP_ROOT_DIR; ?>/user_dash" class="dashboard-card user-card">
                    <h2>User Dashboard</h2>
                    <p>Access user profiles and see registered events at a glance.</p>
                </a>
            </div>
        </div>
    </main>
</body>
