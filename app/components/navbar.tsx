"use client";

import React, { useState } from "react";
import Link from "next/link";
import { Menu, X } from "lucide-react";
import Image from "next/image";

interface NavLink {
  label: string;
  href: string;
}

interface ClassicNavbarProps {
  logoName?: string;
  navLinks?: NavLink[];
}

export const ClassicNavbar: React.FC<ClassicNavbarProps> = ({
  logoName = 'Page & Pen',
  navLinks = [
    { label: 'Word of the Day', href: '/' },
    { label: 'Prompt of the Day', href: '/products' },
    { label: 'Library Collection', href: '/pricing' },
    { label: 'Comprehension', href: '/blog' },
    { label: 'About Us', href: '/company' },
  ],
}) => {
  const [isOpen, setIsOpen] = useState(false);

  return (
    <nav className="fixed top-0 left-0 right-0 z-50 bg-black/20 backdrop-blur-md p-4">
      <div className="max-w-7xl mx-auto">
        <div className="border border-white/10 rounded-2xl bg-black/40 backdrop-blur-xl px-6 py-4">
          <div className="flex justify-between items-center gap-8">
            <Link href="/" className="flex items-center gap-2 shrink-0">
              <div className="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                <Image src="/pagepenlogo.png" alt="Logo Image" width={500} height={500}/>
              </div>
              <span className="text-white font-semibold text-lg sm:in-line pl-2">
                {logoName}
              </span>
            </Link>
            <div className="flex items-center gap-3 ml-auto">
              <button className="hidden sm:block px-6 py-2 bg-white text-black font-semibold rounded-xl hover:bg-gray-200 transition-colors text-sm">
                Sign In
              </button>

              {/* menu */}
              <button
                onClick={() => setIsOpen(!isOpen)}
                className="md:hidden text-white p-2"
              >
                {isOpen ? <X size={24} /> : <Menu size={24} />}
              </button>
            </div>
          </div>

          {isOpen && (
            <div className="md:hidden mt-4 pt-4 border-t border-white/10 space-y-3">
              {navLinks.map((link) => (
                <Link
                  key={link.href}
                  href={link.href}
                  className="block text-gray-300 hover:text-white text-sm font-medium transition-colors py-2"
                  onClick={() => setIsOpen(false)}
                >
                  {link.label}
                </Link>
              ))}
              <div className="flex flex-col gap-3 pt-3">
                <button className="w-full px-6 py-2 bg-white text-black font-semibold rounded-xl hover:bg-gray-200 transition-colors text-sm">
                  Sign In
                </button>
              </div>
            </div>
          )}
        </div>
      </div>
    </nav>
  );
};

export default ClassicNavbar;