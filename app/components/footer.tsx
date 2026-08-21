"use client";

import React from "react";
import Link from "next/link";

interface NavLink {
  label: string;
  href: string;
}

interface ClassicFooterProps {
  logo?: string;
  navLinks?: NavLink[];
}

export const ClassicFooter: React.FC<ClassicFooterProps> = ({
  navLinks = [
    { label: 'Word of the Day', href: '/' },
    { label: 'Prompt of the Day', href: '/products' },
    { label: 'Library Collection', href: '/pricing' },
    { label: 'Comprehension', href: '/blog' }
  ],
}) => {

  return (
    <nav className="hidden md:block fixed bottom-0 left-0 right-0 z-50 bg-black/20 backdrop-blur-md p-4">
      <div className="max-w-7xl mx-auto">
        <div className="border border-white/10 rounded-2xl bg-black/40 backdrop-blur-xl px-6 py-4">
          <div className="flex justify-between items-center gap-6 mx-20">
              {navLinks.map((link) => (
                <Link
                  key={link.href}
                  href={link.href}
                  className="text-gray-300 hover:text-white text-sm font-medium transition-colors duration-200 whitespace-nowrap"
                >
                  {link.label}
                </Link>
              ))}
          </div>
        </div>
      </div>
    </nav>
  );
};

export default ClassicFooter;