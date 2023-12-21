<?php 

    class LeaveManagementSystem {
        private $entitlementPerYear = 21;
        private $annualLeaveBalance = 0;

        // Function to calculate remaining leave days
        public function calculateRemainingLeave($takenDays) {
            $remainingDays = $this->entitlementPerYear + $this->annualLeaveBalance - $takenDays;

            // Ensure remaining days are not negative
            return max(0, $remainingDays);
        }

        // Function to request leave
        public function requestLeave($takenDays) {
            $remainingDays = $this->calculateRemainingLeave($takenDays);

            if ($remainingDays >= 0) {
                // Grant leave and update the remaining days
                echo "Leave granted. Remaining leave days: $remainingDays";

                // Update the annual leave balance for the next year
                $this->annualLeaveBalance = max(0, $remainingDays);
            } else {
                // Insufficient leave balance
                echo "Insufficient leave balance. You have $this->entitlementPerYear days (plus carryover).";
            }
        }

        
    }




?>