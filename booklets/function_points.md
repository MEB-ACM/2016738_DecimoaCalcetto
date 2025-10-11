### Function Point Analysis (FPA) - Methodology Report
This document details the Function Point Analysis (FPA) conducted. As we know, the goal
is to provide a standardized, technology-independent measure of the software's functional 
size based on the user stories.

The final estimated size of the project is 88.29 Adjusted Function Points (FP).

This estimation is derived from two main steps:
1. Unadjusted Function Points (UFP) Calculation: measuring the raw functional size of the application.
2. Value Adjustment Factor (VAF) Calculation: adjusting the raw size based on the system's general characteristics.

## Step 1: Unadjusted Function Points (UFP) Analysis
The UFP calculation is based on identifying and classifying all user-recognizable functionalities into five standard types defined by the IFPUG methodology. The primary source for this identification process was the set of user stories.

# Data Functions (ILF & EIF)
Data functions represent the logical data groups managed by the system.
- Internal Logical Files (ILF): These are groups of data maintained inside the application's boundary. We identified two main ILFs:
    1. User Data (ILF): this component represents all data related to users (players and referees), such as personal details, credentials and roles. Its existence is justified by user stories requiring registration, login and profile management (US 18, 19, 20).
    2. Match Data (ILF): this component encompasses all information related to a football match, including location, time, participating players, referee, score and status. It is central to numerous user stories like creating, searching and updating matches (US 1, 4, 7, 15, 17).

- External Interface Files (EIF): this is data used by the application but managed outside its boundary.
    Social Auth Data (EIF): user story 19 mentions login via social media. This implies that our application reads user data (e.g., name, email) from an external system like Google or Facebook, which acts as an EIF.

# Transaction Functions (EI, EO, EQ)
Transaction functions represent the processes that handle data.
- External Inputs (EI): these are processes that allow users to add or modify data within the system's ILFs . We identified several EIs by grouping similar user stories:
    - User Registration and Edit Profile (US 18, 19) are clear examples of EIs as they directly create and update the User Data ILF.
    - Create New Match (US 7, 8) is a complex EI that involves a form with numerous fields to create a new entry in the Match Data ILF.
    - Update Match Results (US 15) is a critical EI for referees, allowing them to modify an existing match's data.


- External Inquiries (EQ): these are simple data retrieval processes that present information to the user without complex calculations .
    - Search & Filter Matches (US 1, 2, 12) is a core EQ. It allows users to query the Match Data ILF based on various criteria.
    - View Match History and View User Profile (US 4, 17, 18) are also EQs as they involve reading and displaying data from our ILFs without significant processing.

- External Outputs (EO): these processes present information that requires some calculation or generation of derived data before being shown to the user.
    - Match Notifications & Reminders (US 5, 10, 14) was classified as an EO because it's not a simple data retrieval. The system must process dates, times, and match statuses to generate a derived output (the notification itself).

# Complexity Assessment
The complexity (Low, Medium, High) for each component was determined by estimating two parameters: DET (Data Element Types, i.e., fields) and FTR/RET (File Types Referenced / Record Element Types).

- Example 1 - Create New Match (EI - High): this transaction was rated as High. The form to create a match involves many fields (DET > 15) like location, date, time, skill level and number of players. Furthermore, it references at least two files (FTR = 2): it writes to Match Data and reads from User Data to link the organizer. According to the complexity matrix, this combination results in a High complexity.

- Example 2 - User Data (ILF - Low): This data group was rated as Low. It represents a single logical entity (RET = 1) and contains a limited number of fields (DETs like name, email, password, age), which is well within the 1-19 DET range for Low complexity according to the matrix.

## Step 2: Value Adjustment Factor (VAF) Rationale
The VAF adjusts the UFP score to account for the overall technical and environmental complexity of the project. We evaluated the 14 General System Characteristics (GSCs) on a scale of 0 to 5.

The total score (TDI) was 44, resulting in a VAF of 1.09.

Below is the rationale for the most significant ratings:
- Online Data Entry (Rated 5 - Essential): this received the highest rating because uno of the core values of "Decimo a Calcetto" is its interactive nature. Almost every key feature, from registration and profile editing to creating matches and updating results, relies on users entering data online.

- Distributed Data Processing (Rated 4 - Significant): the project's architecture is explicitly described as distributed, with separate Frontend and Backend containers and a dedicated database. This distribution adds complexity that must be managed, justifying a high rating.

- Performance & End-User Efficiency (Rated 3 & 4 - Significant): for an application centered on finding and joining matches, performance and a smooth user experience are critical success factors. The system must be responsive and easy to navigate, justifying a significant rating for these characteristics.

- Complex Processing (Rated 2 - Moderate): while the system includes important logic for filtering and state management, it does not involve complex mathematical algorithms, scientific calculations or AI processing. Therefore, its processing complexity is considered moderate, not high.

- Multiple Sites (Rated 1 - Incidental): this rating is low because the system is designed as a single, centralized platform. It is not intended to be installed in multiple, independent sites for different organizational units.

## Step 3: Final Result
By applying the VAF to the UFP, we obtain the final functional size of the project.

# Unadjusted Function Points (UFP): 81

# Value Adjustment Factor (VAF): 1.09

# Adjusted Function Points (FP): 81 × 1.09 = 88.29

This final value of 88.29 FP provides a standardized measure of the project's size, which will serve as the foundation for subsequent effort and schedule estimations using the COCOMO II model.