function fillForm() {
    const formData = {
        last_name: "Albarico",
        first_name: "Archie",
        middle_name: "Amas",
        birth_date: "2000-10-24",
        gender: "male",
        civil_status: "single",
        nationality: "Filipino",
        religion: "Roman Catholic",
        email: "archiealbarico@gmail.com",
        tel: "1234567",
        number: "09123456789",
        rm: "RM101",
        house: "Lot 1 Blk 2",
        street: "Main Street",
        subdivision: "Sample Subdivision",
        barangay: "Sample Barangay",
        city: "Sample City",
        province: "Sample Province",
        countries: "Philippines",
        zip: "6000",
        rm_home: "RM202",
        house_home: "Lot 3 Blk 4",
        street_home: "Home Street",
        subdivision_home: "Home Subdivision",
        barangay_home: "Home Barangay",
        city_home: "Home City",
        province_home: "Home Province",
        countries_home: "Philippines",
        zip_home: "6001",
        father_last_name: "Albarico",
        father_first_name: "Mario",
        father_middle_name: "Beduya",
        mother_last_name: "Luna",
        mother_first_name: "Jessie",
        mother_middle_name: "Amas"
    };

    for (const key in formData) {
        if (formData.hasOwnProperty(key)) {
            const inputField = document.querySelector(`[name=${key}]`);
            if (inputField) {
                if (inputField.type === "radio") {
                    document.querySelector(`[name=${key}][value=${formData[key]}]`).checked = true;
                } else if (inputField.tagName === 'SELECT') {
                    inputField.value = formData[key];
                }
                else {
                    inputField.value = formData[key];
                }
            }
        }
    }
}