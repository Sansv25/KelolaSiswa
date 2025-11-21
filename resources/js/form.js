//==================== FORMATTER FUNCTIONS ====================//
function limitDigits(id, max) {
    const el = document.getElementById(id);
    el?.addEventListener("input", () => {
        el.value = el.value.replace(/\D/g, "").slice(0, max);
    });
}

function setupPhoneFormatter(id) {
    const el = document.getElementById(id);
    if (!el) return;
    el.addEventListener("input", () => {
        const digits = el.value.replace(/\D/g, "").slice(0, 12);
        const part1 = digits.slice(0, 4);
        const part2 = digits.slice(4, 8);
        const part3 = digits.slice(8, 12);
        el.value = [part1, part2, part3].filter(Boolean).join("-");
    });
}

function setupRupiahFormatter(id) {
    const el = document.getElementById(id);
    if (!el) return;

    el.addEventListener("input", () => {
        let raw = el.value.replace(/\D/g, "");
        el.dataset.raw = raw;
    });

    el.addEventListener("blur", () => {
        let raw = el.dataset.raw || "";
        if (!raw) {
            el.value = "";
            return;
        }
        let formatted = raw.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        el.value = `Rp ${formatted}`;  // Diperbaiki: Format standar Rupiah adalah "Rp " di depan
    });

    el.addEventListener("focus", () => {
        let raw = el.dataset.raw || "";
        el.value = raw;
    });
}

//==================== MAIN ====================//
document.addEventListener('DOMContentLoaded', () => {
    //==================== FORMATTER INIT ====================//
    const formatters = [
        { id: 'nis', max: 4 },
        { id: 'nisn', max: 12 },
        { id: 'no_kk', max: 16 },
        { id: 'ntlp_siswa', max: 13 },
        { id: 'nik', max: 16 }
    ];
    formatters.forEach(f => limitDigits(f.id, f.max));

    setupPhoneFormatter('ntlp_siswa');
    setupPhoneFormatter('ntlp_ortu');
    setupRupiahFormatter('penghasilan_ayah');
    setupRupiahFormatter('penghasilan_ibu');

    //==================== FORM STEPPER ====================//
    let currentStep = 1;
    const totalSteps = 4; // Sesuai dengan HTML (Step 1-4)

    const stepIndicator = document.getElementById('stepIndicator');
    const stepTitle = document.getElementById('stepTitle');
    const progressBar = document.getElementById('progressBar');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const judulform = document.getElementById('judul-form');

    const updateFormVisibility = () => {
        for (let i = 1; i <= totalSteps; i++) {
            const formBlock = document.getElementById(`form-step-${i}`);
            formBlock?.classList.remove('active');
        }

        const activeForm = document.getElementById(`form-step-${currentStep}`);
        if (!activeForm) return;
        activeForm.classList.add('active');

        const inputs = activeForm.querySelectorAll('.input-form');
        inputs.forEach((el, index) => {
            el.classList.remove('animate-kiri', 'animate-kanan', 'reverse');
            void el.offsetWidth;
            const direction = index % 2 === 0 ? 'animate-kiri' : 'animate-kanan';
            el.classList.add(direction);
            el.style.animationDelay = `${300 + Math.floor(index / 2) * 300}ms`;
            el.style.transform = 'none';
        });
    };

    const updateStepIndicatorClass = () => {
        stepIndicator?.classList.remove('step-1-of-3', 'step-2-of-3', 'step-3-of-3');

        if (currentStep <= 2) {
            stepIndicator?.classList.add('step-1-of-3');
            judulform.textContent = 'INPUT DATA SISWA';
        } else if (currentStep <= 3) {
            stepIndicator?.classList.add('step-2-of-3');
            judulform.textContent = 'INPUT DATA ORANG TUA';
        } else {
            stepIndicator?.classList.add('step-3-of-3');
            judulform.textContent = 'INPUT DATA LAINNYA';
        }
    };

    const updateStep = () => {
        updateStepIndicatorClass();
        stepTitle.textContent = `Langkah ${currentStep} Dari ${totalSteps}`;
        progressBar.style.width = `${(currentStep / totalSteps) * 100}%`;
        updateFormVisibility();
        prevBtn.classList.toggle('button-prev-disabled', currentStep === 1);

        nextBtn.innerHTML = currentStep === totalSteps
            ? `SELESAI <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                    <path
                        d="M579-480 285-774q-15-15-14.5-35.5T286-845q15-15 35.5-15t35.5 15l307 308q12 12 18 27t6 30q0 15-6 30t-18 27L356-115q-15 15-35 14.5T286-116q-15-15-15-35.5t15-35.5l293-293Z" />
                </svg>`
            : `SELANJUTNYA <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M579-480 285-774q-15-15-14.5-35.5T286-845q15-15 35.5-15t35.5 15l307 308q12 12 18 27t6 30q0 15-6 30t-18 27L356-115q-15 15-35 14.5T286-116q-15-15-15-35.5t15-35.5l293-293Z" /></svg>`;
    };

    //==================== VALIDASI ====================//
    const createErrorTag = () => {
        const span = document.createElement('span');
        span.className = 'error-message text-red-500 text-sm mt-1 block';
        span.textContent = 'Field ini wajib diisi';
        return span;
    };

    const validateStep = (step) => {
        const currentForm = document.getElementById(`form-step-${step}`);
        if (!currentForm) return false;

        const inputs = currentForm.querySelectorAll('input, select');
        let isValid = true;
        currentForm.querySelectorAll('.error-message').forEach(el => el.remove());

        const checkedRadios = new Set();

        inputs.forEach(input => {
            const value = input.value.trim();
            const type = input.type;

            // Khusus untuk kewarganegaraan_lain: wajib diisi hanya jika kewarganegaraan dipilih "lainnya" (value="lainnya")
            if (input.id === 'kewarganegaraan_lain') {
                const selectKewarganegaraan = document.getElementById('kewarganegaraan');
                if (selectKewarganegaraan && selectKewarganegaraan.value === 'lainnya') {
                    if (value === '') {
                        isValid = false;
                        const errorTag = createErrorTag();
                        input.insertAdjacentElement('afterend', errorTag);
                    }
                }
                return; // Skip validasi lainnya untuk input ini
            }

            // Skip validasi jika input memiliki atribut data-optional="true"
            if (input.hasAttribute('data-optional') && input.getAttribute('data-optional') === 'true') return;

            if (type === 'radio') {
                if (checkedRadios.has(input.name)) return;
                checkedRadios.add(input.name);

                const group = currentForm.querySelectorAll(`input[name="${input.name}"]`);
                const isChecked = Array.from(group).some(r => r.checked);
                if (!isChecked) {
                    isValid = false;
                    const errorTag = createErrorTag();
                    group[group.length - 1].closest('.radio')?.appendChild(errorTag);
                }
            } else if (value === '') {
                isValid = false;
                const errorTag = createErrorTag();
                input.insertAdjacentElement('afterend', errorTag);
            }
        });

        return isValid;
    };

    const findFirstInvalidStep = () => {
        for (let i = 1; i <= totalSteps; i++) {
            if (!validateStep(i)) return i;
        }
        return null;
    };

    //==================== ANIMASI KELUAR ====================//
    const animateStepOut = (direction, callback) => {
        const currentForm = document.getElementById(`form-step-${currentStep}`);
        if (!currentForm) {
            callback();
            return;
        }

        const inputs = currentForm.querySelectorAll('.input-form');
        inputs.forEach(el => {
            el.classList.add(`animate-${direction}`, 'reverse');
        });

        setTimeout(() => {
            inputs.forEach(el => {
                el.classList.remove(`animate-${direction}`, 'reverse');
            });
            callback();
        }, 700);
    };

    //==================== TOMBOL ====================//
    nextBtn.addEventListener('click', () => {
        if (!validateStep(currentStep)) return;

        if (currentStep < totalSteps) {
            animateStepOut('kiri', () => {
                const currentForm = document.getElementById(`form-step-${currentStep}`);
                currentForm?.classList.remove('active');
                currentStep++;
                updateStep();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        } else {
            // Validasi semua step sebelum submit
            const firstInvalid = findFirstInvalidStep();
            if (firstInvalid !== null) {
                currentStep = firstInvalid;
                updateStep();
                window.scrollTo({ top: 0, behavior: 'smooth' });
                return;
            }

            // Submit form jika valid
            document.querySelector('form')?.submit();
        }
    });

    prevBtn.addEventListener('click', () => {
        if (currentStep > 1) {
            animateStepOut('kanan', () => {
                const currentForm = document.getElementById(`form-step-${currentStep}`);
                currentForm?.classList.remove('active');
                currentStep--;
                updateStep();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }
    });

    //==================== TOGGLE INPUT KEWARGANEGARAAN ====================//
    function toggleInput(value) {
        const inputDiv = document.getElementById('negaralainnya');
        if (value === 'lainnya') {  // Diperbarui: Match dengan value="lainnya" pada option "Lainnya"
            inputDiv.style.display = 'block';
        } else {
            inputDiv.style.display = 'none';
        }
    }

    // ✅ Panggil render awal
    updateStep();
});


document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('[id^="custom-"]').forEach(wrapper => {
                const id = wrapper.id.replace('custom-', '');
                const hiddenSelect = document.getElementById(id);
                const toggle = wrapper.querySelector('.custom-toggle');
                const options = wrapper.querySelector('.custom-options');
                const selectedText = wrapper.querySelector('.custom-text');
                const selectedIcon = wrapper.querySelector('.custom-icon');

                toggle.addEventListener('click', (e) => {
                    e.stopPropagation();
                    options.classList.toggle('hidden');
                });

                options.querySelectorAll('li[data-value]').forEach(li => {
                    li.addEventListener('click', () => {
                        const value = li.getAttribute('data-value');
                        const text = li.textContent.trim();
                        const img = li.querySelector('img');

                        hiddenSelect.value = value;
                        selectedText.textContent = text;

                        if (selectedIcon) {
                            if (img) {
                                selectedIcon.src = img.src;
                                selectedIcon.alt = text;
                                selectedIcon.classList.remove('hidden');
                            } else {
                                selectedIcon.classList.add('hidden');
                            }
                        }

                        options.classList.add('hidden');
                    });
                });

                document.addEventListener('click', (e) => {
                    if (!wrapper.contains(e.target)) {
                        options.classList.add('hidden');
                    }
                });

                // initialize from old value
                const val = hiddenSelect.value;
                if (val) {
                    const li = options.querySelector(`li[data-value="${val}"]`);
                    if (li) li.click();
                }
            });
        });
