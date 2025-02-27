document.addEventListener("DOMContentLoaded", function() {
    // Configuration
    const API_BASE_URL = window.location.origin + "/japit-forms";
    const FETCH_USER_ENDPOINT = `${API_BASE_URL}/php/fetch_user.php`;
    
    const modal = document.getElementById("editModal");
    
    // Helper to safely set form field values
    function setFormValue(elementId, value) {
        const element = document.getElementById(elementId);
        if (element) {
            element.value = value || '';
        } else {
            console.warn(`Element with ID '${elementId}' not found`);
        }
    }
    
    // Handle edit button clicks
    document.querySelectorAll(".edit-btn").forEach(button => {
        button.addEventListener("click", async function() {
            const userId = this.dataset.id;
            if (!userId) {
                console.error("No user ID provided");
                return;
            }
            
            modal.style.display = "block";
            
            try {
                const response = await fetch(FETCH_USER_ENDPOINT, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                        "X-Requested-With": "XMLHttpRequest" // CSRF protection
                    },
                    body: `user_id=${encodeURIComponent(userId)}`
                });
                
                if (!response.ok) {
                    throw new Error(`Server returned ${response.status}: ${response.statusText}`);
                }
                
                const data = await response.json();
                
                if (data.error) {
                    throw new Error(data.error);
                }
                
                // Populate form fields
                populateForm(data);
            } catch (error) {
                console.error("Error fetching user data:", error);
                alert(`Failed to load user data: ${error.message}`);
                modal.style.display = "none";
            } finally {
                loadingIndicator.style.display = "none";
            }
        });
    });
    
    // Populate form with user data
    async function populateForm(data) {
        // Basic text fields
        const textFields = {
            "edit-name": data.first_name, 
        };
        
        Object.entries(textFields).forEach(([id, value]) => {
            setFormValue(id, value);
        });
        
        // Handle radio buttons for sex
        const maleRadio = document.getElementById("edit-sex-male");
        const femaleRadio = document.getElementById("edit-sex-female");
        
        if (maleRadio && femaleRadio) {
            maleRadio.checked = data.sex === "male";
            femaleRadio.checked = data.sex === "female";
        }
        
        // Handle civil status and conditional fields
        const statusSelect = document.getElementById("edit-status");
        const otherStatus = document.getElementById("otherStatus");
        
        if (statusSelect) {
            statusSelect.value = data.civil_status || "";
            
            if (otherStatus) {
                if (data.civil_status === "others") {
                    otherStatus.style.display = "block";
                    otherStatus.value = data.other_status || "";
                } else {
                    otherStatus.style.display = "none";
                }
            }
        }
        
        // Handle location dropdowns with proper dependency chain
        try {
            // Set region first and wait
            const regionSet = await setSelectValue('edit-region', data.region_code);
            if (regionSet) {
                // Wait for province options to load after region change event
                await new Promise(resolve => setTimeout(resolve, 300));
                const provinceSet = await setSelectValue('edit-province', data.province_code);
                
                if (provinceSet) {
                    // Wait for municipality options to load after province change event
                    await new Promise(resolve => setTimeout(resolve, 300));
                    const municipalitySet = await setSelectValue('edit-municipality', data.municipality_code);
                    
                    if (municipalitySet) {
                        // Wait for barangay options to load after municipality change event
                        await new Promise(resolve => setTimeout(resolve, 300));
                        await setSelectValue('edit-barangay', data.barangay_code);
                    }
                }
            }
        } catch (err) {
            console.warn("Error setting location dropdown values:", err);
        }
    }
    
    // Close modal when clicking outside or on close button
    window.addEventListener("click", function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
    
    if (closeBtn) {
        closeBtn.addEventListener("click", function() {
            modal.style.display = "none";
        });
    }
    
    // Handle form submission - add if needed
    const editForm = document.getElementById("edit-user-form");
    if (editForm) {
        editForm.addEventListener("submit", function(event) {
            // Add validation logic here if needed
            
            // Uncomment to prevent default form submission and handle via AJAX
            // event.preventDefault();
            // const formData = new FormData(this);
            // // Submit form data via fetch
        });
    }
});