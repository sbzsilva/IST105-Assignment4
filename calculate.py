#!/usr/bin/env python3
"""
Calculation module for the calculator application.
Contains functions to perform various mathematical operations.
"""

import math


def validate_inputs(a, b, c):
    """
    Validate the input values.
    
    Args:
        a (float): First value
        b (float): Second value
        c (float): Third value
        
    Returns:
        tuple: (is_valid, error_message)
    """
    # Check if all values are numeric
    if not all(isinstance(x, (int, float)) for x in [a, b, c]):
        return False, "All values must be numeric."
    
    # Check if value A is at least 1
    if a < 1:
        return False, "Value A must be at least 1."
    
    # Check if value C is non-negative
    if c < 0:
        return False, "Value C cannot be negative."
    
    return True, ""


def perform_calculation(a, b, c):
    """
    Perform the main calculation based on the provided values.
    
    Args:
        a (float): First value
        b (float): Second value
        c (float): Third value
        
    Returns:
        dict: Dictionary containing the result and any additional messages
    """
    # Validate inputs first
    is_valid, error_message = validate_inputs(a, b, c)
    if not is_valid:
        return {"error": error_message}
    
    # Perform calculations
    messages = []
    
    # Special handling for when B is 0
    if b == 0:
        messages.append("Note: Value B is 0 and will not affect the result.")
    
    # Cube value C
    c_cubed = c ** 3
    
    # Different calculation paths based on c_cubed value
    if c_cubed > 1000:
        intermediate = math.sqrt(c_cubed) * 10
    else:
        intermediate = math.sqrt(c_cubed) / a
    
    # Final result
    final_result = intermediate + b
    
    result = {
        "result": round(final_result, 2),
        "messages": messages
    }
    
    return result


def format_result(result_dict):
    """
    Format the result for display.
    
    Args:
        result_dict (dict): Dictionary containing result and messages
        
    Returns:
        str: Formatted result string
    """
    if "error" in result_dict:
        return f"Error: {result_dict['error']}"
    
    result_str = f"Result: {result_dict['result']:.2f}"
    
    if result_dict["messages"]:
        result_str += " - " + " ".join(result_dict["messages"])
        
    return result_str


# Example usage (for testing)
if __name__ == "__main__":
    # Test cases
    test_cases = [
        (2, 5, 10),   # Normal case
        (1, 0, 5),    # B is 0
        (2, 3, 15),   # Large C value
        (0.5, 2, 3),  # A less than 1 (invalid)
        (2, 3, -1),   # Negative C (invalid)
    ]
    
    for a, b, c in test_cases:
        print(f"Testing with a={a}, b={b}, c={c}")
        result = perform_calculation(a, b, c)
        print(format_result(result))
        print("-" * 40)