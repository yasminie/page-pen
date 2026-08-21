"use client";
import React, { useState } from 'react';

export const Flashcard = () => {

    const [isFlipped, setIsFlipped] = useState(false);
    
    return (
        <div className="flex items-center justify-center min-h-screen">
            <div 
            onClick={() => setIsFlipped(!isFlipped)}
            className="w-96 h-96 rounded-2xl p-8 shadow-2xl cursor-pointer flex flex-col justify-between relative overflow-hidden border border-black transition-transform duration-300"
            >
            <div className="flex-1 flex items-center justify-center">
                <p className="text-4xl font-light text-center text-black">
                {isFlipped ? "HELLO" : "GOODBYE"}
                </p>
            </div>

            {!isFlipped && (
                <div className="text-center">
                <p className="text-black text-sm font-medium">Click here to reveal</p>
                </div>
            )}
            </div>

        </div>
    )
}

export default Flashcard;