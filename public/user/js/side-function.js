
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            const toggleSidebarBtn = document.getElementById('toggleSidebar');
            const closeSidebarBtn = document.getElementById('closeSidebar');

            function toggleSidebar() {
                if (window.innerWidth > 768) {
                    // Desktop behavior
                    sidebar.classList.toggle('collapsed');
                    mainContent.classList.toggle('expanded');
                } else {
                    // Mobile behavior
                    sidebar.classList.toggle('active');
                }
            }

            function closeSidebar() {
                if (window.innerWidth > 768) {
                    sidebar.classList.add('collapsed');
                    mainContent.classList.add('expanded');
                } else {
                    sidebar.classList.remove('active');
                }
            }

            // Event listeners
            if (toggleSidebarBtn) {
                toggleSidebarBtn.addEventListener('click', toggleSidebar);
            }

            if (closeSidebarBtn) {
                closeSidebarBtn.addEventListener('click', closeSidebar);
            }

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    // Reset mobile classes
                    sidebar.classList.remove('active');
                    // Apply desktop state
                    if (sidebar.classList.contains('collapsed')) {
                        mainContent.classList.add('expanded');
                    } else {
                        mainContent.classList.remove('expanded');
                    }
                } else {
                    // Reset desktop classes
                    sidebar.classList.remove('collapsed');
                    mainContent.classList.remove('expanded');
                    // Apply mobile state
                    sidebar.classList.remove('active');
                }
            });

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                if (window.innerWidth <= 768) {
                    if (!sidebar.contains(event.target) && 
                        !toggleSidebarBtn.contains(event.target) && 
                        sidebar.classList.contains('active')) {
                        closeSidebar();
                    }
                }
            });

            // Initial setup
            if (window.innerWidth <= 768) {
                closeSidebar();
            }

            
            });
 